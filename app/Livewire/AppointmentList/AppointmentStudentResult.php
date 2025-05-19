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
        $this->validate([
            'result_files.*' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
        ], [
            'result_files.*.mimes' => 'Only PDF, JPG, JPEG, and PNG files are allowed.',
        ]);

        // Total size validation (max 2MB)
        $totalSize = collect($this->result_files)->sum(function ($file) {
            return $file->getSize(); // in bytes
        });

        if ($totalSize > 2 * 1024 * 1024) {
            $this->reset('result_files');
            $this->addError('result_files', 'The total size of selected files must not exceed 2MB.');
            return;
        }

        $filePaths = [];

        // Save each uploaded file
        foreach ($this->result_files as $file) {
            $filePaths[] = $file->store('documents', 'public');
        }

        $paths = $filePaths[0] ? json_encode($filePaths) : null;

        // Example: store only the first file path, or handle multiple records if needed
        $medical_result = $this->selectedAppointment->medical_results()->create([
            'result_file_path' => $paths,
            'semester' => now()->month <= 6 ? '2nd sem' : '1st sem',
            'school_year' => now()->month <= 6
                ? (now()->year - 1) . '-' . now()->year
                : now()->year . '-' . (now()->year + 1),
            'upload_date' => now(),
            'reviewed_by' => auth()->user()->id,
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
