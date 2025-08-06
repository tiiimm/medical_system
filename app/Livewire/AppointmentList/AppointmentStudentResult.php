<?php

namespace App\Livewire\AppointmentList;

use App\Models\MedicalResults;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class AppointmentStudentResult extends Component
{
    use WithFileUploads;
    
    public $selectedAppointment;
    public $selectedUser;

    public $result_files = [];

    public function store()
    {
        $existing = auth()->user()->medical_results()
            ->where('school_year', auth()->user()->SystemSetting->school_year)
            ->where('semester', auth()->user()->SystemSetting->semester)
            ->exists();

        if ($existing) {
            $text = 'You have already submitted results for the '. auth()->user()->SystemSetting->school_year .'  '. auth()->user()->SystemSetting->semester .'. Can\'t submit again.';
            $this->js("alert(" . json_encode($text) . ")");
            return;
        }
        $this->validate([
            'result_files.*' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:3072', // 3072 KB = 3MB
        ], [
            'result_files.*.mimes' => 'Only PDF, JPG, JPEG, and PNG files are allowed.',
            'result_files.*.max' => 'Each file must not be larger than 3MB.',
        ]);

        $filePaths = [];

        foreach ($this->result_files as $file) {
            $filePaths[] = $file->store('documents', 'public');
        }

        $paths = $filePaths[0] ? json_encode($filePaths) : null;

        $medical_result = $this->selectedAppointment->medical_results()->create([
            'user_id' => auth()->id(),
            'result_file_path' => $paths,
            'semester' => now()->month <= 6 ? '2nd sem' : '1st sem',
            'school_year' => now()->month <= 6
                ? (now()->year - 1) . '-' . now()->year
                : now()->year . '-' . (now()->year + 1),
            'upload_date' => now(),
            'uploaded_by' => auth()->user()->id
        ]);

        session()->flash('success', 'Medical results saved successfully!');
        $this->js("alert('Medical results saved successfully!')");

        $this->selectedAppointment->update([
            'status' => 'Results submitted'
        ]);
        $this->selectedAppointment->logs()->create([
            'status' => 'Results submitted',
            'updated_by' =>auth()->user()->id
        ]);

        return redirect('/appointment-list')->with(true);
    }

    public function mount()
    {
        // Check if selectedAppointment exists in the session
        $this->selectedAppointment = auth()->user()->appointments()->latest()->first();
        $this->selectedUser = auth()->user();

        // If no user is selected, redirect back to the user list page
        if (!$this->selectedAppointment) {
            return redirect()->route('appointment-list')->with('error', 'No student selected.');
        }
    }

    public function render()
    {
        return view('livewire.appointment-list.student-result');
    }
}
