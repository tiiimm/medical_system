<?php

namespace App\Livewire\StudentList;

use App\Models\MedicalResults;
use Barryvdh\DomPDF\Facade\Pdf;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Crypt;
use Livewire\Component;

class MedicalRecords extends Component
{ 
    public $selectedUser;
    public $selectedMedicalRecord;

    public function mount()
    {
        if (session('selectedUser')){
            $this->selectedUser = session('selectedUser');
            session()->keep(['selectedUser']);
        }
        else $this->selectedUser = auth()->user();

        // If no user is selected, redirect back to the user list page
        if (session('selectedUser') && !$this->selectedUser) {
            return redirect()->route('student-list')->with('error', 'No student selected.');
        }
    }

    public function printHealthRecord()
    {
        $payload = [
            'document' => 'health-record',
            'width' => 8.27/2,
            'height' => 11.69,

            'user' => $this->selectedUser
        ];
        $encrypted = Crypt::encrypt($payload);

        $this->dispatch('open-preview-tab', [
            'url' => '/document/preview?token=' . urlencode($encrypted),
        ]);
    }

    public function addNewRecord()
    {
        if ($this->selectedUser->student_information->medical_results->count() > 0) {
            $this->js("alert('Record already added for this semester.')");
            return;
        }

        return redirect('/student-list/new-medical-result')->with('selectedUser', $this->selectedUser);
    }

    public function showDetails($id)
    {
        // Fetch the medical record by ID
        $this->selectedMedicalRecord = MedicalResults::find($id);

        // Trigger the modal to open using a browser event
        $this->dispatch('show-modal');
    }
    
    public function verifyResults($id)
    {
        $this->selectedUser = MedicalResults::find($id)->user;

        return redirect('/student-list/new-medical-result')->with('selectedUser', $this->selectedUser);
    }
    
    public function downloadFile($id)
    {
        $medicalResult = MedicalResults::find($id);

        // Check if the file exists before attempting to download
        if ($medicalResult && file_exists(storage_path('app/public/' . $medicalResult->result_file_path))) {
            // Return the file as a download response
            return response()->download(storage_path('app/public/' . $medicalResult->result_file_path));
        } else {
            // Handle the case where the file does not exist
            session()->flash('error', 'File not found.');
        }
    }

    public function generateCertificate($medicalResultId)
    {
        $encryptedId = Crypt::encryptString($medicalResultId);
        $medicalResult = MedicalResults::find($medicalResultId);

        $url = route('medical-status', ['encryptedId' => $encryptedId]);

        // Generate the QR code
        $qrCode = new QrCode($url);
        $writer = new PngWriter();
        $qrCodeBinary = $writer->write($qrCode);
        
        // Save the QR code as an image or generate a data URL
        $qrCodeUrl = base64_encode($qrCodeBinary->getString());

        $payload = [
            'studentName' => $medicalResult->user->student_information->user->name,
            'yearLevel' => $medicalResult->user->student_information->year_level,
            'course' => $medicalResult->user->student_information->program->name,
            'dateReleased' => $medicalResult->appointment->appointment_date??now(),
            'qrCodeUrl' => $qrCodeUrl,
            'document' => 'medical-certificate',
            'width' => 8.5,
            'height' => 13,
        ];
        $encrypted = Crypt::encrypt($payload);

        $this->dispatch('open-preview-tab', [
            'url' => '/document/preview?token=' . urlencode($encrypted),
        ]);

    }

    public function render()
    {
        $medical_results = MedicalResults::where(function($query) {
            $query->where('user_id', $this->selectedUser->id);
        })
        ->orderBy('upload_date', 'desc')
        ->get();

        return view('livewire.student-list.medical-records', ['medical_results' => $medical_results]);
    }
}
