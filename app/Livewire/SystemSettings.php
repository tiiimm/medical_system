<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SystemSetting;

class SystemSettings extends Component
{
    public $semester;
    public $school_year;
    public $sy_start;
    public $sy_end;
    public $medical_start;
    public $medical_end;

    public function mount()
    {
        $settings = SystemSetting::first();

        $this->semester = $settings->semester;
        $this->school_year = $settings->school_year;
        $this->sy_start = explode('-', $settings->school_year)[0];
        $this->sy_end = explode('-', $settings->school_year)[1];
        $this->medical_start = $settings->medical_start;
        $this->medical_end = $settings->medical_end;
    }

    public function updateSyEnd()
    {
        $this->sy_end = $this->sy_start + 1;
    }

    public function updateSettings()
    {
        $this->validate([
            'semester' => 'required|string|max:255',
            'school_year' => 'required|string|max:255',
            'medical_start' => 'required|date',
            'medical_end' => 'required|date',
        ]);

        $settings = SystemSetting::first();

        $settings->update([
            'semester' => $this->semester,
            'school_year' => $this->sy_start.'-'.$this->sy_end,
            'medical_start' => $this->medical_start,
            'medical_end' => $this->medical_end,
        ]);

        session()->flash('message', 'Settings updated successfully!');
    }

    public function render()
    {
        return view('livewire.system-settings');
    }
}