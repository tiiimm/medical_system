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
        if (session('selectedUser'))
            $this->selectedUser = session('selectedUser');
        else $this->selectedUser = auth()->user();

        // If no user is selected, redirect back to the user list page
        if (session('selectedUser') && !$this->selectedUser) {
            return redirect()->route('student-list')->with('error', 'No student selected.');
        }
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
        $medicalResult = MedicalResults::find($medicalResultId)->first();

        $url = route('medical-status', ['encryptedId' => $encryptedId]);

        // Generate the QR code
        $qrCode = new QrCode($url);
        $writer = new PngWriter();
        $qrCodeBinary = $writer->write($qrCode);
        
        // Save the QR code as an image or generate a data URL
        $qrCodeUrl = base64_encode($qrCodeBinary->getString());

        $pdf = PDF::loadView('pdf.medical-certificate', [
            'studentName' => $medicalResult->student_information->user->name,
            'yearLevel' => $medicalResult->student_information->year_level,
            'course' => $medicalResult->student_information->program->name,
            'dateReleased' => now()->toFormattedDateString(),
            'qrCodeUrl' => $qrCodeUrl,
        ]);
    
        return response()->streamDownload(function () use ($pdf) {
            echo $pdf->stream();
        }, 'medical-certificate.pdf');

        // // Option 2: Download the PDF directly
        // // return $pdf->download('medical-certificate.pdf');
    }

    public function render()
    {
        $medical_results = $this->selectedUser->student_information->medical_results;

        return view('livewire.student-list.medical-records', ['medical_results' => $medical_results]);
    }
}
