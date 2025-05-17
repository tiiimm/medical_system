<?php

namespace App\Livewire\Auth;

use Illuminate\Validation\ValidationException;
use Livewire\Component;
use Illuminate\Support\Facades\Mail;
use App\Mail\OtpMail;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

class Login extends Component
{
    public $email = '';
    public $password = '';
    public $otp = '';
    public $otpSent = false;
    public $otpCode;
    public $user;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required'
    ];

    public function mount()
    {
        // Read query parameters when the component is initialized
        $this->email = request()->query('email', '');
        $this->password = request()->query('password', '');
        $this->otp = request()->query('otp', '');

        // If email and password are provided, attempt to log in
        if ($this->email && $this->password) {
            $this->store();
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }

    public function store()
    {
        if (!$this->otpSent) {
            $this->validate(); 
            
            $this->user = \App\Models\User::where('email', $this->email)->first();

            if (!$this->user || !Hash::check($this->password, $this->user->password)) {
                throw ValidationException::withMessages([
                    'email' => 'Your provided credentials could not be verified.'
                ]);
            }

            // if ($this->user->username == 'tiiimm') {
            //     $this->otpCode = rand(100000, 999999);
            //     $this->sendSms($this->formatPhoneNumber($this->user->profile->contact_number), $this->otpCode);

            //     $this->otpSent = true;
            // }
            // else {
                auth()->login($this->user);  
                session()->regenerate();

                if (is_null(auth()->user()->name)) {
                    return redirect('/setup-account');
                }

                return redirect('/dashboard');
            // }

            return; 
        }

        if ($this->otp != $this->otpCode) {
            $this->js("alert('The OTP you entered is incorrect.')");
            return; 
        }

        auth()->login($this->user);  
        session()->regenerate();

        if (is_null(auth()->user()->username)) {
            return redirect('/setup-account');
        }

        return redirect('/dashboard');
    }

    function formatPhoneNumber($phoneNumber)
    {
        if (substr($phoneNumber, 0, 2) === '09' && strlen($phoneNumber) === 11) {
            return '+63' . substr($phoneNumber, 1);
        }

        return $phoneNumber;
    }

    private function sendSms($contactNumber, $otp)
    {
        $sid = getenv('TWILIO_ACCOUNT_SID');
        $authToken = getenv('TWILIO_AUTH_TOKEN');
        $from = getenv('TWILIO_FROM_NUMBER');
        $to = $contactNumber;
    
        $url = 'https://api.twilio.com/2010-04-01/Accounts/' . $sid . '/Messages.json';
    
        $data = [
            'To' => $to,
            'From' => $from,
            'Body' => 'Your OTP Code is '.$otp.'. Do not share your OTP with anyone',
        ];
    
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_USERPWD, $sid . ':' . $authToken);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        
        $response = curl_exec($ch);
        curl_close($ch);
        
        if ($response === false) {
            $this->js('Twilio SMS Error: ' . curl_error($ch));
        }
        $this->otpSent = true;
    }
}