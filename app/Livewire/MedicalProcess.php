<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class MedicalProcess extends Component
{
    use WithFileUploads;
    
    public $selectedAppointment;
    public $selectedUser;

    public $result_file;
    public $status = '';

    public function render()
    {
        return view('livewire.medical-process');
    }
}
