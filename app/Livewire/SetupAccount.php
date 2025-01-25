<?php

namespace App\Livewire;

use App\Models\Allergy;
use App\Models\Campus;
use App\Models\College;
use App\Models\MedicalHistory;
use App\Models\MedicalProfile;
use App\Models\Profile;
use App\Models\Program;
use App\Models\StudentInformation;
use Livewire\Component;

class SetupAccount extends Component
{
    public $step = 1; // Initial step
    public $campuses = [];
    public $colleges = [];
    public $programs = [];

    public $last_name;
    public $first_name;
    public $middle_name;
    public $extension_name;
    public $street;
    public $barangay;
    public $city;
    public $province;
    public $contact_number;
    public $campus_id = 0;
    public $college_id = 0;
    public $program_id = 0;
    public $major;
    public $student_number;
    public $year_level = 0;
    public $status = 0;
    public $birthdate;
    public $sex = 0;
    public $blood_type = 0;

    public $allergies = []; 
    public $allergy_name = ''; 
    public $triggers = '';
    public $condition_name = '';
    public $treatment = 0;
    public $is_chronic = false;
    public $last_checkup = '';
    public $medical_histories = [];

    protected $rules = [
        'last_name' => 'required|string|max:255',
        'first_name' => 'required|string|max:255',
        'middle_name' => 'nullable|string|max:255',
        'extension_name' => 'nullable|string|max:255',
        'street' => 'required|string|max:255',
        'barangay' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'province' => 'required|string|max:255',
        'contact_number' => 'required|numeric|min:10',
        'campus_id' => 'required|integer|exists:campuses,id',
        'college_id' => 'required|integer|exists:colleges,id',
        'program_id' => 'required|integer|exists:programs,id',
        'student_number' => 'required|string|max:255',
        'major' => 'nullable|string|max:255',
        'year_level' => 'required|string|max:50',
        'status' => 'required|string|max:50',
        'birthdate' => 'required|date',
        'sex' => 'required|string|max:50',
        'blood_type' => 'required|string|max:10',
    ];
    
    public function mount()
    {
        $this->campuses = Campus::select('id', 'name')->get();
    }
    
    public function addAllergy()
    {
        $this->validate([
            'allergy_name' => 'required|string',
            'triggers' => 'nullable|string',
        ]);

        $this->allergies[] = [
            'allergy_name' => $this->allergy_name,
            'triggers' => $this->triggers,
        ];

        // Clear the input fields after adding
        $this->allergy_name = '';
        $this->triggers = '';
    }

    public function removeAllergy($index)
    {
        unset($this->allergies[$index]);
        $this->allergies = array_values($this->allergies);
    }
    
    public function addMedicalHistory()
    {
        $this->validate([
            'condition_name' => 'required|string|max:255',
            'treatment' => 'nullable|string|max:255',
            'is_chronic' => 'required|boolean',
            'last_checkup' => 'nullable|date',
        ]);

        $this->medical_histories[] = [
            'condition_name' => $this->condition_name,
            'treatment' => $this->treatment,
            'is_chronic' => $this->is_chronic,
            'last_checkup' => $this->last_checkup,
        ];

        // Clear the input fields after adding
        $this->condition_name = '';
        $this->treatment = '';
        $this->is_chronic = false;
        $this->last_checkup = '';
    }

    // Remove Medical History
    public function removeMedicalHistory($index)
    {
        unset($this->medical_histories[$index]);
        $this->medical_histories = array_values($this->medical_histories);
    }

    public function updatedCampusId()
    {
        if ($this->campus_id != 1) {
            $this->colleges = College::where('id', 7)->select('id', 'name')->get();
        } else {
            $this->colleges = College::where('id', '!=', 7)->select('id', 'name')->get();
        }
        $this->programs = [];
        $this->program_id = 0;
        $this->college_id = 0;
    }

    public function updatedCollegeId()
    {
        $this->program_id = 0;
        $this->programs = Program::where('college_id', $this->college_id)->select('id', 'name')->get();

    }

    public function store()
    {
        $user = auth()->user();
        $this->validate();

        $user->update([
            'name' => trim($this->last_name . ', ' . $this->first_name . ' ' . ($this->middle_name ? $this->middle_name . ' ' : '') . ($this->extension_name ? $this->extension_name : '')),
        ]);

        $profile = Profile::create([
            'user_id' => $user->id,
            'last_name' => $this->last_name,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name??'',
            'extension_name' => $this->extension_name??'',
            'contact_number' => $this->contact_number,
            'address' => $this->street.', '.$this->barangay.', '.$this->city.', '.$this->province,
            'zppsu_number' => $this->student_number,
        ]);

        $studentInfo = StudentInformation::create([
            'user_id' => $user->id,
            'campus_id' => $this->campus_id,
            'college_id' => $this->college_id,
            'program_id' => $this->program_id,
            'major' => $this->major,
            'year_level' => $this->year_level,
            'status' => $this->status,
        ]);

        $medicalProfile = MedicalProfile::create([
            'profile_id' => $profile->id,
            'birthdate' => $this->birthdate,
            'sex' => $this->sex,
            'blood_type' => $this->blood_type
        ]);

        foreach ($this->medical_histories as $medical_history) {
            MedicalHistory::create([
                'medical_profile_id' => $medicalProfile->id,
                'condition_name' => $medical_history['condition_name'],
                'treatment' => 'Ongoing',
                'is_chronic' => $medical_history['is_chronic'],
            ]);
        }

        foreach ($this->allergies as $allergy) {
            Allergy::create([
                'medical_profile_id' => $medicalProfile->id,
                'allergy_name' => $allergy['allergy_name'],
                'triggers' => $allergy['triggers'],
            ]);
        }


        $this->js("alert('Done setting up!')");

        return redirect('/dashboard')->with('first_access', true);
    }

    public function render()
    {
        return view('livewire.setup-account');
    }
}
