<?php

namespace App\Livewire\AppointmentList;

use App\Models\MedicalResults;
use Livewire\Component;
use Barryvdh\DomPDF\Facade\Pdf;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Support\Facades\Crypt;

class AppointmentResult extends Component
{    
    public $selectedAppointment;
    public $selectedUser;

    public $condition;
    public $additional_comments;
    public $tests = [
        // 'hepatitis_a' => ['result' => 'Negative', 'abnormality' => null, 'remarks' => null],
        'hepatitis_b' => ['result' => 'Negative', 'abnormality' => null, 'remarks' => null],
        'fecalysis' => ['result' => 'Normal', 'abnormality' => null, 'remarks' => null],
        'xray' => ['result' => 'Normal', 'abnormality' => null, 'remarks' => null],
        'cbc' => ['result' => 'Normal', 'abnormality' => null, 'remarks' => null],
        'blood_typing' => ['result' => null, 'abnormality' => null, 'remarks' => null],
        'ishihara' => ['result' => 'Normal', 'abnormality' => null, 'remarks' => null],
        'urinalysis' => ['result' => 'Normal', 'abnormality' => null, 'remarks' => null],
        'drugtest' => ['result' => 'Negative', 'abnormality' => null, 'remarks' => null],
    ];

    public $testDisplayMap = [
        // 'hepatitis_a' => 'Hepatitis A',
        'hepatitis_b' => 'Hepatitis B',
        'fecalysis' => 'Fecalysis',
        'xray' => 'Chest XRay',
        'cbc' => 'CBC',
        'blood_typing' => 'Blood Typing',
        'ishihara' => 'Ishihara',
        'urinalysis' => 'Urinalysis',
        'drugtest' => 'Drug Test'
    ];

    public $testAbnormalities = [
        // 'hepatitis_a' => ['Hepatitis A Positive'],
        'hepatitis_b' => ['Hepatitis B Positive'],
        'fecalysis' => ['Intestinal Parasites', 'Bacterial Infection', 'Occult Blood'],
        'xray' => ['Tuberculosis', 'Pneumonia', 'Broken Bones', 'Lung Scarring', 'COPD'],
        'cbc' => ['Anemia', 'Infection', 'Leukemia', 'Vitamin Deficiencies'],
        'blood_typing' => ['Rare Blood Type'],
        'ishihara' => ['Color Blindness'],
        'urinalysis' => ['UTI', 'Kidney Disease', 'Diabetes'],
        'drugtest' => ['Substance Abuse', 'Prescription Drug Abuse', 'Illegal Drug Use']
    ];

    public $availableTests = ['xray', 'drugtest'];

    protected function rules()
    {
        $rules = [
            'condition' => 'nullable|string',
            'additional_comments' => 'nullable|string',
        ];

        foreach ($this->availableTests as $testName) {
            $rules["tests.$testName.result"] = 'required|string';
            $rules["tests.$testName.abnormality"] = "required_if:tests.$testName.result,Abnormal,Positive|string|nullable";
            $rules["tests.$testName.remarks"] = 'nullable|string';
        }

        return $rules;
    }

    public function store()
    {
        $this->validate();

        $testResults = [];
        
        // Build test results array based on student's major and year level
        $isFoodRelated = $this->selectedAppointment->student_information->major->food_related;
        $isFirstYear = $this->selectedAppointment->student_information->year_level == '1st year';

        // Always include these tests
        $testResults['XRay'] = $this->tests['xray'];
        $testResults['Drug Test'] = $this->tests['drugtest'];

        // Include additional tests based on conditions
        if ($isFoodRelated) {
            // $testResults['Hepatitis A'] = $this->tests['hepatitis_a'];
            $testResults['Hepatitis B'] = $this->tests['hepatitis_b'];
            $testResults['Fecalysis'] = $this->tests['fecalysis'];
            
            if ($isFirstYear) {
                $testResults['CBC'] = $this->tests['cbc'];
                $testResults['Blood Typing'] = $this->tests['blood_typing'];
                $testResults['Urinalysis'] = $this->tests['urinalysis'];
            }
        } else {
            if ($isFirstYear) {
                $testResults['CBC'] = $this->tests['cbc'];
                $testResults['Blood Typing'] = $this->tests['blood_typing'];
                $testResults['Urinalysis'] = $this->tests['urinalysis'];
            }
        }

        // Include Ishihara test if needed (add your condition)
        // $testResults['Ishihara'] = $this->tests['ishihara'];

        // Filter out empty tests
        $testResults = array_filter($testResults, function ($test) {
            return !empty(array_filter($test));
        });

        // Save the medical results
        $medical_result = $this->selectedAppointment->medical_results()->update([
            'test_results' => json_encode($testResults),
            'condition' => $this->condition,
            'additional_comments' => $this->additional_comments,
            'semester' => now()->month <= 6 ? '2nd sem' : '1st sem',
            'school_year' => now()->month <= 6 ? (now()->year - 1) . '-' . now()->year : now()->year . '-' . (now()->year + 1),
            'upload_date' => now(),
            'reviewed_by' => auth()->user()->id,
            'uploaded_by' => auth()->user()->id
        ]);

        // Update appointment status
        $this->selectedAppointment->update([
            'status' => 'Results Verified'
        ]);
        
        $this->selectedAppointment->logs()->create([
            'status' => 'Results Verified',
            'updated_by' => auth()->user()->id
        ]);
        
        // Uncomment these if needed
        // $this->sendSms($this->formatPhoneNumber($this->selectedAppointment->student_information->user->profile->contact_number), $medical_result);
        $this->generateCertificate($this->selectedAppointment->medical_results->id);
        
        return redirect('/appointment-list')->with(true);
    }

    public function mount()
    {
        $this->selectedAppointment = session('selectedAppointment');
        if (session('selectedAppointment')) {
            session()->keep(['selectedAppointment']);
        }
        $this->selectedUser = $this->selectedAppointment->student_information->user;

        if (!$this->selectedAppointment) {
            return redirect()->route('appointment-list')->with('error', 'No student selected.');
        }
        
        $isFoodRelated = $this->selectedUser->student_information->major->food_related;
        $isFirstYear = $this->selectedUser->student_information->year_level == "1st year";
        
        if ($isFoodRelated) {
            array_push($this->availableTests, 'hepatitis_b', 'fecalysis');
            if ($isFirstYear) {
                array_push($this->availableTests, 'cbc', 'blood_typing', 'urinalysis');
            }
        } else {
            if ($isFirstYear) {
                array_push($this->availableTests, 'cbc', 'blood_typing', 'urinalysis');
            }
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

        $payload = [
            'studentName' => $medicalResult->user->student_information->user->name,
            'yearLevel' => $medicalResult->user->student_information->year_level,
            'course' => $medicalResult->user->student_information->program->name,
            'dateReleased' => $medicalResult->appointment->appointment_date?? now(),
            'qrCodeUrl' => $qrCodeUrl,
            'document' => 'medical-certificate',
            'width' => 8.5,
            'height' => 13,
            'user' => $this->selectedUser
        ];
        $encrypted = Crypt::encrypt($payload);

        $this->dispatch('open-preview-tab', [
            'url' => '/document/preview?token=' . urlencode($encrypted),
        ]);

        // // Option 2: Download the PDF directly
        // // return $pdf->download('medical-certificate.pdf');
    }

    function formatPhoneNumber($phoneNumber)
    {
        if (substr($phoneNumber, 0, 2) === '09' && strlen($phoneNumber) === 11) {
            return '+63' . substr($phoneNumber, 1);
        }

        return $phoneNumber;
    }

    private function sendSms($contactNumber, $medical_result)
    {
        $sid = getenv('TWILIO_ACCOUNT_SID');
        $authToken = getenv('TWILIO_AUTH_TOKEN');
        $from = getenv('TWILIO_FROM_NUMBER');;
        $to = $contactNumber;
    
        $url = 'https://api.twilio.com/2010-04-01/Accounts/' . $sid . '/Messages.json';
    
        $data = [
            'To' => $to,
            'From' => $from,
            'Body' => 'This is to inform you that your results have been posted. You may check the portal to view your results',
        ];
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $sid . ':' . $authToken);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        
        $response = curl_exec($ch);
        curl_close($ch);
        
        if ($response === false) {
            $this->js('Twilio SMS Error: ' . curl_error($ch));
        }
        $this->generateCertificate($medical_result->id);
    }

    public function render()
    {
        return view('livewire.appointment-list.result');
    }
}
