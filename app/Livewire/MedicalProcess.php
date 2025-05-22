<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Auth;

class MedicalProcess extends Component
{
    use WithFileUploads;
    
    public $selectedAppointment;
    public $selectedUser;

    public $result_files = [];

    public function render()
    {
        return view('livewire.medical-process');
    }

    public function store()
    {
        $existing = auth()->user()->medical_results()
            ->where('school_year', '2024-2025')
            ->where('semester', '2nd sem')
            ->exists();

        if ($existing) {
            $this->js("alert('You have already submitted results for the 2024–2025 2nd semester. Can\'t submit again.')");
            return;
        }
        $this->validate([
            'result_files.*' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048', // 2048 KB = 2MB
        ], [
            'result_files.*.mimes' => 'Only PDF, JPG, JPEG, and PNG files are allowed.',
            'result_files.*.max' => 'Each file must not be larger than 2MB.',
        ]);

        
        // $this->validate([
        //     'result_files.*' => 'nullable|file|mimes:pdf,jpg,jpeg,png',
        // ], [
        //     'result_files.*.mimes' => 'Only PDF, JPG, JPEG, and PNG files are allowed.',
        // ]);

        // // Total size validation (max 2MB)
        // $totalSize = collect($this->result_files)->sum(function ($file) {
        //     return $file->getSize(); // in bytes
        // });

        // if ($totalSize > 2 * 1024 * 1024) {
        //     $this->reset('result_files');
        //     $this->addError('result_files', 'The total size of selected files must not exceed 2MB.');
        //     return;
        // }

        $filePaths = [];

        // Save each uploaded file
        foreach ($this->result_files as $file) {
            $filePaths[] = $file->store('documents', 'public');
        }

        $paths = $filePaths[0] ? json_encode($filePaths) : null;

        // Example: store only the first file path, or handle multiple records if needed
        $medical_result = auth()->user()->medical_results()->create([
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

        // $this->selectedAppointment->update([
        //     'status' => 'Results submitted'
        // ]);
        // $this->selectedAppointment->logs()->create([
        //     'status' => 'Results submitted',
        //     'updated_by' =>auth()->user()->id
        // ]);

        return redirect('/medical-records')->with(true);
    }
}
