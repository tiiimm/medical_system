<?php

namespace App\Livewire;

use App\Models\Appointment;
use App\Models\SystemSetting;
use Livewire\Attributes\On;
use Livewire\Component;

class BookAppointment extends Component
{
    #[On('save-appointment')]
    public function store($date, $schedule)
    {
        $user = auth()->user();

        $existingAppointment = Appointment::where('user_id', $user->id)
            ->where('school_year', SystemSetting::first()->school_year)
            ->where('semester', SystemSetting::first()->semester)
            ->where('status', '!=', 'Missed')
            ->first();

        if ($existingAppointment) {
            $this->js("alert('You can only book one appointment per semester unless you missed your previous appointment.')");
            return;
        }

        $appointmentNumber = $this->generateAppointmentNumber($date, $schedule);
    
        $appointment = Appointment::create([
            'user_id' => $user->id,
            'appointment_number' => $appointmentNumber,
            'appointment_date' => $date,
            'appointment_schedule' => $schedule,
            'school_year' => SystemSetting::first()->school_year,
            'semester' => SystemSetting::first()->semester,
            'status' => 'Pending',
        ]);
    
        $this->sendSms($this->formatPhoneNumber($user->profile->contact_number), $date, $schedule, $appointmentNumber);
    }
    
    private function generateAppointmentNumber($date, $schedule)
    {
        $appointmentCount = Appointment::whereDate('appointment_date', $date)
            ->where('appointment_schedule', $schedule)
            ->count();
    
        $appointmentCount++;
    
        return '#' . str_pad($appointmentCount, 4, '0', STR_PAD_LEFT);
    }

    function formatPhoneNumber($phoneNumber)
    {
        if (substr($phoneNumber, 0, 2) === '09' && strlen($phoneNumber) === 11) {
            return '+63' . substr($phoneNumber, 1);
        }

        return $phoneNumber;
    }
    
    private function sendSms($contactNumber, $date, $schedule, $appointmentNumber)
    {
        $sid = getenv('TWILIO_ACCOUNT_SID');
        $authToken = getenv('TWILIO_AUTH_TOKEN');
        $from = '+13613154818';
        $to = $contactNumber;
    
        $url = 'https://api.twilio.com/2010-04-01/Accounts/' . $sid . '/Messages.json';
    
        $data = [
            'To' => $to,
            'From' => $from,
            'Body' => 'Successful appointment booking! Your appointment is on '.$date.' '.$schedule.'. You are number '.$appointmentNumber,
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
        } else {
            $this->js("alert('Appointment Booked!')");
            return redirect('/book-appointment');
        }
    }

    public function render()
    {
        return view('livewire.book-appointment');
    }
}
