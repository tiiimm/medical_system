<?php

namespace App\Livewire\MedicalStaffList;

use App\Models\Campus;
use App\Models\User;
use Livewire\Component;

class NewMedicalStaff extends Component
{   
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

    protected $rules = [
        'last_name' => 'required|string|max:255',
        'first_name' => 'required|string|max:255',
        'middle_name' => 'nullable|string|max:255',
        'extension_name' => 'nullable|string|max:50',
        'street' => 'required|string|max:255',
        'barangay' => 'required|string|max:255',
        'city' => 'required|string|max:255',
        'province' => 'required|string|max:255',
        'contact_number' => 'required|string|max:15',
        'email' => 'required|email|max:255',
        'username' => 'required|string|max:255',
        'campus_id' => 'required|exists:campuses,id',
        'zppsu_number' => 'required|string|max:20',
    ];
    
    public function mount()
    {
        $this->campuses = Campus::all();
    }

    public function store() {
        $this->validate();

        $user = User::create([
            'email' => $this->email,
            'username' => $this->username,
            'password' => bcrypt('secret'),
            'role' => 'medical staff',
            'name' => trim($this->last_name . ', ' . $this->first_name . ' ' . ($this->middle_name ? $this->middle_name . ' ' : '') . ($this->extension_name ? $this->extension_name : '')),
        ]);
        
        $user->profile()->create([
            'last_name' => $this->last_name,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name??'',
            'extension_name' => $this->extension_name??'',
            'contact_number' => $this->contact_number,
            'address' => $this->street.', '.$this->barangay.', '.$this->city.', '.$this->province,
            'zppsu_number' => $this->zppsu_number,
        ]);

        $this->js("alert('Successfully created medical staff!')");
        return redirect('/medical-staff-list');
    }
    
    public function render()
    {
        return view('livewire.medical-staff-list.new-medical-staff');
    }
}
