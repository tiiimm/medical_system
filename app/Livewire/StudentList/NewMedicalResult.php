<?php

namespace App\Livewire\StudentList;

use App\Models\MedicalResults;
use Livewire\Component;
use Livewire\WithFileUploads;
use Barryvdh\DomPDF\Facade\Pdf;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Crypt;

class NewMedicalResult extends Component
{
    use WithFileUploads;
    
    public $selectedUser;

    public $hematology_result = 'Normal';
    public $hematology_abnormality;
    public $hematology_remarks;
    public $urinalysis_result = 'Normal';
    public $urinalysis_abnormality;
    public $urinalysis_remarks;
    public $xray_result = 'Normal';
    public $xray_abnormality;
    public $xray_remarks;
    public $ishihara_result = 'Normal';
    public $ishihara_abnormality;
    public $ishihara_remarks;
    public $drugtest_result = 'Negative';
    public $drugtest_abnormality;
    public $drugtest_remarks;
    public $condition;
    public $additional_comments;
    public $result_file;

    protected $rules = [
        'hematology_result' => 'required|string',
        'hematology_abnormality' => 'required_if:hematology_result,abnormal|string|nullable',
        'hematology_remarks' => 'nullable|string',
        'urinalysis_result' => 'required|string',
        'urinalysis_abnormality' => 'required_if:urinalysis_result,abnormal|string|nullable',
        'urinalysis_remarks' => 'nullable|string',
        'xray_result' => 'required|string',
        'xray_abnormality' => 'required_if:xray_result,abnormal|string|nullable',
        'xray_remarks' => 'nullable|string',
        'ishihara_result' => 'required|string',
        'ishihara_abnormality' => 'required_if:ishihara_result,abnormal|string|nullable',
        'ishihara_remarks' => 'nullable|string',
        'drugtest_result' => 'required|string',
        'drugtest_abnormality' => 'required_if:drugtest_result,positive|string|nullable',
        'drugtest_remarks' => 'nullable|string',
        'condition' => 'nullable|string',
        'additional_comments' => 'nullable|string',
        'result_file' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
    ];

    public function store()
    {
        $this->validate();

        // Save the file if uploaded
        if ($this->result_file) {
            $filePath = $this->result_file->store('documents', 'public');
        }

        // Example of storing data (adjust to your database structure)
        $medical_result = $this->selectedUser->student_information->medical_results()->create([
            'hematology_result' => $this->hematology_result,
            'hematology_abnormality' => $this->hematology_abnormality,
            'hematology_remarks' => $this->hematology_remarks,
            'urinalysis_result' => $this->urinalysis_result,
            'urinalysis_abnormality' => $this->urinalysis_abnormality,
            'urinalysis_remarks' => $this->urinalysis_remarks,
            'xray_result' => $this->xray_result,
            'xray_abnormality' => $this->xray_abnormality,
            'xray_remarks' => $this->xray_remarks,
            'ishihara_result' => $this->ishihara_result,
            'ishihara_abnormality' => $this->ishihara_abnormality,
            'ishihara_remarks' => $this->ishihara_remarks,
            'drugtest_result' => $this->drugtest_result,
            'drugtest_abnormality' => $this->drugtest_abnormality,
            'drugtest_remarks' => $this->drugtest_remarks,
            'condition' => $this->condition,
            'additional_comments' => $this->additional_comments,
            'result_file_path' => $filePath ?? null,
            'semester' => now()->month <= 6 ? '2nd sem' : '1st sem',
            'school_year' => now()->month <= 6 ? (now()->year - 1) . '-' . now()->year : now()->year . '-' . (now()->year + 1),
            'upload_date' => now(),
            'reviewed_by' => 1,
            'uploaded_by' => 1
        ]);

        session()->flash('success', 'Medical results saved successfully!');
        $this->js("alert('Done setting up!')");
        return $this->generateCertificate($medical_result->id);
        return redirect('/student-list')->with(true);
    }

    public function mount()
    {
        // Check if selectedUser exists in the session
        $this->selectedUser = session('selectedUser');

        // If no user is selected, redirect back to the user list page
        if (!$this->selectedUser) {
            return redirect()->route('student-list')->with('error', 'No student selected.');
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
        return view('livewire.student-list.new-medical-result');
    }
}
