<?php

namespace App\Livewire;

use App\Models\Profile;
use Livewire\Component;

class MedicalLookup extends Component
{
    public $response='';
    public $student_id;

    public function lookup()
    {
        $profile = Profile::where('zppsu_number', $this->student_id)->first();
        if (is_null($profile)) {
            $this->response = 'No record found. If this is a mistake, please come visit the clinic';
            return;
        }
        if ($profile->user->role != 'student') {
            $this->response = 'No record found. If this is a mistake, please come visit the clinic';
            return;
        }
        $count = $profile->user->student_information->medical_results->count();

        if ($count > 0)  $this->response = 'Student underwent medical and results are posted in their account';
        else  $this->response = 'No record found. If this is a mistake, please come visit the clinic';
    }

    public function render()
    {
        return view('livewire.medical-lookup');
    }
}
