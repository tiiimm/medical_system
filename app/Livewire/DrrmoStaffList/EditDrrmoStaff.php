<?php

namespace App\Livewire\DrrmoStaffList;

use App\Models\Campus;
use App\Models\User;
use Livewire\Component;

class EditDrrmoStaff extends Component
{
    public $selectedUser;
    public $campuses = [];

    public $email;
    public $username;
    public $last_name;
    public $first_name;
    public $middle_name;
    public $extension_name;
    public $contact_number;
    public $street;
    public $barangay;
    public $city;
    public $province;
    public $zppsu_number;
    public $campus_id = 0;

    protected function rules(){
        return [
            'last_name' => 'required|string|max:255',
            'first_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'extension_name' => 'nullable|string|max:50',
            'street' => 'required|string|max:255',
            'barangay' => 'required|string|max:255',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'contact_number' => 'required|string|max:15',
            'email' => 'required|email|max:255|unique:users,email,' . $this->selectedUser->id,
            'username' => 'required|string|max:255',
            'campus_id' => 'required|exists:campuses,id',
            'zppsu_number' => 'required|string|max:20',
        ];
    }
    
    public function mount()
    {
        $this->campuses = Campus::all();
        $this->selectedUser = session('selectedUser');
        if (session('selectedUser')) {
            session()->keep(['selectedUser']);
        }

        if (!$this->selectedUser) {
            return redirect()->route('student-list')->with('error', 'No student selected.');
        }

        $this->email = $this->selectedUser->email;
        $this->username = $this->selectedUser->username;
        $this->last_name = $this->selectedUser->profile->last_name;
        $this->first_name = $this->selectedUser->profile->first_name;
        $this->middle_name = $this->selectedUser->profile->middle_name;
        $this->extension_name = $this->selectedUser->profile->extension_name;
        $this->contact_number = $this->selectedUser->profile->contact_number;
        $this->street = $this->selectedUser->profile->street;
        $this->barangay = $this->selectedUser->profile->barangay;
        $this->city = $this->selectedUser->profile->city;
        $this->province = $this->selectedUser->profile->province;
        $this->zppsu_number = $this->selectedUser->profile->zppsu_number;
        // $this->campus_id = $this->selectedUser->profile->campus_id;
    }

    public function update() {
        $this->validate();

        $user = User::find($this->selectedUser)->first;
        $user->update([
            'email' => $this->email,
            'username' => $this->username,
            'name' => trim($this->last_name . ', ' . $this->first_name . ' ' . ($this->middle_name ? $this->middle_name . ' ' : '') . ($this->extension_name ? $this->extension_name : '')),
        ]);
        
        $user->profile()->update([
            'last_name' => $this->last_name,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name??'',
            'extension_name' => $this->extension_name??'',
            'contact_number' => $this->contact_number,
            'address' => $this->street.', '.$this->barangay.', '.$this->city.', '.$this->province,
            'zppsu_number' => $this->zppsu_number,
        ]);

        $this->js("alert('Successfully updated drrmo staff!')");
        return redirect('/drrmo-staff-list');
    }

    public function render()
    {
        return view('livewire.drrmo-staff-list.edit-drrmo-staff');
    }
}
