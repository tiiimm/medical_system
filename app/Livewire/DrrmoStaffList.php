<?php

namespace App\Livewire;

use App\Models\Campus;
use App\Models\College;
use App\Models\Program;
use App\Models\StudentInformation;
use App\Models\User;
use Livewire\Component;

class DrrmoStaffList extends Component
{
    public $selectedUser = null;

    public $search = '';
    public $users = [];

    public function mount()
    {
        $this->users = User::where('role', 'drrmo staff')->with('profile')->get();
    }

    public function updatedSearch()
    {
        $this->filterUsers('search');
    }

    // Filter the students based on selected filters
    public function filterUsers($category)
    {
        $query = User::where('role', 'drrmo staff');

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
        $this->users = $query->with('profile')->get();
    }

    public function deactivateUser($userId)
    {
        $user = User::find($userId);

        if ($user) {
            $user->update(['is_active' => false]);
            $this->js("alert('User deactivated successfully!')");
        } else {
            $this->js("alert('User not found.')");
        }
        $this->search = '';
        $this->filterUsers('search');
        return $this->users;
    }
    
    public function confirmDeactivation($userId)
    {
        $this->dispatch('showConfirmation', [
            'message' => 'Are you sure you want to deactivate this user?',
            'callback' => 'deactivateUser',
            'userId' => $userId
        ]);
    }
    
    public function confirmReactivation($userId)
    {
        $this->dispatch('showConfirmation', [
            'message' => 'Are you sure you want to reactivate this user?',
            'callback' => 'reactivateUser',
            'userId' => $userId
        ]);
    }

    public function reactivateUser($userId)
    {
        $user = User::find($userId);

        if ($user) {
            $user->update(['is_active' => true]);
            $this->js("alert('User reactivated successfully!')");
        } else {
            $this->js("alert('User not found.')");
        }
        $this->search = '';
        $this->filterUsers('search');
        return $this->users;
    }
    
    public function addDrrmoStaff()
    {
        return redirect('/drrmo-staff-list/new-drrmo-staff');
    }

    public function showDetails($userId)
    {
        $user = User::find($userId);

        return redirect('/drrmo-staff-list/edit-drrmo-staff')->with('selectedUser', $user);
    }

    public function render()
    {
        return view('livewire.drrmo-staff-list');
    }
}
