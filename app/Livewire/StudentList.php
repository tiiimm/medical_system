<?php

namespace App\Livewire;

use App\Models\Campus;
use App\Models\College;
use App\Models\Program;
use App\Models\StudentInformation;
use App\Models\User;
use Livewire\Component;

class StudentList extends Component
{
    public $selectedUser = null;
    public $campuses;
    public $colleges;
    public $programs;

    public $campus_id = 0;
    public $program_id = 0;
    public $search = '';
    public $users = [];

    public function mount()
    {
        $this->campuses = Campus::select('id', 'name')->get();
        $this->colleges = College::select('id', 'name')->get();
        $this->programs = Program::select('id', 'name')->get();
        $this->users = User::where('role', 'student')->get();
    }

    public function updatedCampusId()
    {
        $this->filterUsers('campus');
    }

    public function updatedProgramId()
    {
        $this->filterUsers('program');
    }

    public function updatedSearch()
    {
        $this->filterUsers('search');
    }

    // Filter the students based on selected filters
    public function filterUsers($category)
    {
        $query = User::where('role', 'student');
    
        // Apply filters to the user query directly
        if ($category == 'campus' && $this->campus_id) {
            $query->whereHas('student_information', function ($query) {
                $query->where('campus_id', $this->campus_id);
            });
        }
    
        if ($category == 'program' && $this->program_id) {
            $query->whereHas('student_information', function ($query) {
                $query->where('program_id', $this->program_id);
            });
        }
    
        if ($category == 'search' && $this->search) {
            $query->where(function ($query) {
                $query->where('name', 'like', '%' . $this->search . '%')
                    ->orWhere('email', 'like', '%' . $this->search . '%')
                      ->orWhereHas('profile', function ($query) {
                          $query->where('zppsu_number', 'like', '%' . $this->search . '%');
                      });
            });
        }
    
        // Eager load the student_information relationship
        $this->users = $query->with('student_information', 'profile')->get();
    }

    public function showDetails($userId)
    {
        $this->selectedUser = User::find($userId);

        // return redirect('/student-list/new-medical-result')->with('selectedUser', $this->selectedUser);
        return redirect('/student-list/medical-records')->with('selectedUser', $this->selectedUser);
    }

    public function render()
    {
        return view('livewire.student-list');
    }
}
