<?php

namespace App\Livewire;

use App\Models\Campus;
use App\Models\College;
use App\Models\Program;
use App\Models\StudentInformation;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class StudentList extends Component
{
    use WithPagination; // Use Livewire's pagination trait

    public $selectedUser = null;
    public $campuses;
    public $colleges;
    public $programs;

    public $campus_id = 0;
    public $program_id = 0;
    public $search = '';
    public $allergies;
    public $medical_histories;

    public function mount()
    {
        $this->campuses = Campus::select('id', 'name')->get();
        $this->colleges = College::select('id', 'name')->get();
        $this->programs = Program::select('id', 'name')->get();
    }

    public function updatedCampusId()
    {
        $this->resetPage(); // Reset pagination when filters change
        $this->filterUsers();
    }

    public function updatedProgramId()
    {
        $this->resetPage(); // Reset pagination when filters change
        $this->filterUsers();
    }

    public function updatedSearch()
    {
        $this->resetPage(); // Reset pagination when search changes
        $this->filterUsers();
    }

    // Filter the students based on selected filters
    public function filterUsers()
    {
        $query = User::where('role', 'student');

        // Apply filters to the user query directly
        if ($this->campus_id) {
            $query->whereHas('student_information', function ($query) {
                $query->where('campus_id', $this->campus_id);
            });
        }

        if ($this->program_id) {
            $query->whereHas('student_information', function ($query) {
                $query->where('program_id', $this->program_id);
            });
        }

        if ($this->search) {
            $query->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                    ->orWhereHas('profile', function ($query) {
                        $query->where('zppsu_number', 'like', '%' . $this->search . '%');
                    });
            });
        }

        // Eager load the student_information and profile relationships
        return $query->with('student_information', 'profile')->paginate(10); // Paginate with 10 records per page
    }

    public function openModal($userId)
    {
        $this->selectedUser = User::find($userId);
        $this->allergies = '';

        foreach ($this->selectedUser->student_information->user->profile->medical_profile->allergies as $index => $allergy) {
            $this->allergies .= $allergy->allergy_name . ' (' . ($allergy->is_active ? 'Active' : 'Resolved') . ' - Triggered by ' . $allergy->triggers . '), ';
        }
        $this->medical_histories = '';

        foreach ($this->selectedUser->student_information->user->profile->medical_profile->medical_histories as $index => $history) {
            $this->medical_histories .= $history->condition_name . ' (' . ($history->is_chronic ? 'Chronic' : 'Not Chronic') . ' - Treatment: ' . $history->treatment . '), ';
        }

        $this->dispatch('showModal');
    }

    public function showDetails($userId)
    {
        $this->selectedUser = User::find($userId);

        return redirect('/student-list/medical-records')->with('selectedUser', $this->selectedUser);
    }

    public function render()
    {
        // Fetch paginated users based on filters
        $users = $this->filterUsers();

        return view('livewire.student-list', [
            'users' => $users,
        ]);
    }
}