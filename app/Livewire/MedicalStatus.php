<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Crypt;
use App\Models\MedicalResults;

class MedicalStatus extends Component
{
    public $medicalResult;
    public $medicalResultId;

    public function mount($encryptedId)
    {
        // Decrypt the ID from the QR code
        $this->medicalResultId = Crypt::decryptString($encryptedId);

        // Query the database to get the medical result
        $this->medicalResult = MedicalResults::find($this->medicalResultId);
    }

    public function render()
    {
        return view('livewire.medical-status');
    }
}