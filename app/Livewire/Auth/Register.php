<?php

namespace App\Livewire\Auth;

use App\Models\User;
use Livewire\Component;

class Register extends Component
{

    public $name ='';
    public $username = '';
    public $email = '';
    public $password = '';
    public $termsAccepted = false;

    protected $rules = [
    'termsAccepted' => 'accepted', // Add this
    'username' => 'required|min:6',
    'email' => 'required|email|unique:users,email',
    'password' => 'required|min:6',
];


    public function store(){

        if (!$this->termsAccepted) {
            // You can return an error message or prevent the form submission.
            $this->js("alert('You must agree to the terms and conditions')");
            return;
        }

        $attributes = $this->validate();

        $user = User::create($attributes);

        auth()->login($user);
        
        return redirect('/setup-account');
    } 

    public function render()
    {
        return view('livewire.auth.register');
    }
}
