<?php

namespace App\Livewire;

use App\Models\Appointment;
use Carbon\Carbon;
use Livewire\Component;

class AppointmentList extends Component
{
    public $selectedAppointment = null;
    public $appointmentId;
    public $status;
    public $showTodayOnly = false;

    public function openStatusUpdateModal($appointmentId)
    {
        $this->appointmentId = $appointmentId;
        $this->dispatch('showModal');
    }

    public function updateStatus()
    {
        $appointment = Appointment::find($this->appointmentId);
        $appointment->update([
            'status' => $this->status
        ]);
        $appointment->logs()->create([
            'status' => $this->status,
            'updated_by' =>auth()->user()->id
        ]);

        $this->sendSms($this->formatPhoneNumber($appointment->student_information->user->profile->contact_number));

        $this->js("alert('Successfully updated!')");
        return redirect('/appointment-list');
    }

    function formatPhoneNumber($phoneNumber)
    {
        if (substr($phoneNumber, 0, 2) === '09' && strlen($phoneNumber) === 11) {
            return '+63' . substr($phoneNumber, 1);
        }

        return $phoneNumber;
    }

    private function sendSms($contactNumber)
    {
        $sid = getenv('TWILIO_ACCOUNT_SID');
        $authToken = getenv('TWILIO_AUTH_TOKEN');
        $from = '+13613154818';
        $to = $contactNumber;
    
        $url = 'https://api.twilio.com/2010-04-01/Accounts/' . $sid . '/Messages.json';
    
        $data = [
            'To' => $to,
            'From' => $from,
            'Body' => 'Congratulations! You successfully finished your medical process. Please wait for the notification that your result has been posted',
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
    }

    public function showDetails($appointmentId)
    {
        $this->selectedAppointment = Appointment::find($appointmentId);

        return redirect('/appointment-list/result')->with('selectedAppointment', $this->selectedAppointment);
    }

    public function goBackToList()
    {
        $this->selectedAppointment = null;
    }

    public function toggleShowTodayOnly()
    {
        $this->showTodayOnly = !$this->showTodayOnly;
        $this->render();
    }

    public function render()
    {
        $today = Carbon::today()->toDateString();

        $appointments = Appointment::with('user.profile', 'student_information')
            ->when($this->showTodayOnly, function ($query) use ($today) {
                return $query->whereDate('appointment_date', $today);
            })
            ->get();

        foreach ($appointments as $appointment) {
            $appointment->student_number = $appointment->user->profile->zppsu_number;
        }

        return view('livewire.appointment-list', ['appointments' => $appointments]);
    }

}
