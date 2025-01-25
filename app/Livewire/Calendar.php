<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Appointment;
use App\Models\SystemSetting;
use Livewire\Component;

class Calendar extends Component
{
    public $currentMonth;
    public $currentYear;
    public $calendar = [];
    public $eventSchedule = '';
    public $eventDate = '';
    public $semester;
    public $school_year;
    public $medicalStartDate;
    public $medicalEndDate;

    public function mount()
    {
        $systemSettings = SystemSetting::first();

        if ($systemSettings) {
            $this->semester = $systemSettings->semester;
            $this->school_year = $systemSettings->school_year;
            $this->medicalStartDate = Carbon::parse($systemSettings->medical_start);
            $this->medicalEndDate = Carbon::parse($systemSettings->medical_end);
        } else {
            $this->semester = null;
            $this->school_year = null;
            $this->medicalStartDate = null;
            $this->medicalEndDate = null;
        }

        $this->currentMonth = now()->month;
        $this->currentYear = now()->year;
        $this->generateCalendar();
    }

    public function generateCalendar()
    {
        $startOfMonth = Carbon::createFromDate($this->currentYear, $this->currentMonth, 1);
        $endOfMonth = $startOfMonth->copy()->endOfMonth();

        $startDate = $startOfMonth->startOfWeek(Carbon::SUNDAY);
        $endDate = $endOfMonth->endOfWeek(Carbon::SATURDAY);

        $currentDate = $startDate->copy();

        $weeks = [];
        while ($currentDate->lte($endDate)) {
            $week = [];
            for ($i = 0; $i < 7; $i++) {
                $week[] = [
                    'date' => $currentDate->toDateString(),
                    'day' => $currentDate->day,
                    'is_today' => $currentDate->isToday(),
                    'is_current_month' => $currentDate->month === $this->currentMonth,
                    'events' => $this->isWithinMedicalDateRange($currentDate) ? $this->getEventsForDay($currentDate) : [],
                ];
                $currentDate->addDay();
            }
            $weeks[] = $week;
        }

        $this->calendar = $weeks;
    }

    public function isWithinMedicalDateRange(Carbon $specificDate): bool
    {
        if (!$this->medicalStartDate || !$this->medicalEndDate) {
            return false;
        }

        return $specificDate->between($this->medicalStartDate, $this->medicalEndDate);
    }

    public function getEventsForDay(Carbon $specificDate)
    {
        if ($specificDate->isSunday()) {
            return [];
        }
    
        if (!$this->isWithinMedicalDateRange($specificDate)) {
            return [];
        }

        $events = [];
        $totalSlotsPerDay = 250; 

        foreach (['am', 'pm'] as $schedule) {
            $bookedAppointments = Appointment::where('appointment_date', $specificDate->toDateString())
                ->where('appointment_schedule', strtoupper($schedule))    
                ->count();

            $remainingSlots = $totalSlotsPerDay - $bookedAppointments;

            if ($remainingSlots > 0) {
                $events[] = [
                    'title' => ucfirst($schedule) . " - {$remainingSlots} slots left",
                    'type' => 'primary',
                    'schedule' => strtoupper($schedule),
                    'date' => $specificDate->toDateString(),
                ];
            }
        }

        return $events;
    }

    public function triggerModal($eventSchedule, $eventDate)
    {
        $user = auth()->user();

        $existingAppointment = Appointment::where('user_id', $user->id)
            ->where('school_year', $this->school_year)
            ->where('semester', $this->semester)
            ->where('status', '!=', 'Missed')
            ->first();

        if ($existingAppointment) {
            $this->js("alert('You can only book one appointment per semester unless you missed your previous appointment.')");
            return;
        }

        $this->eventSchedule = $eventSchedule;
        $this->eventDate = $eventDate;

        $this->dispatch('showModal');
    }

    public function goToPreviousMonth()
    {
        $this->currentMonth--;
        if ($this->currentMonth < 1) {
            $this->currentMonth = 12;
            $this->currentYear--;
        }
        $this->generateCalendar();
    }

    public function goToNextMonth()
    {
        $this->currentMonth++;
        if ($this->currentMonth > 12) {
            $this->currentMonth = 1;
            $this->currentYear++;
        }
        $this->generateCalendar();
    }

    public function render()
    {
        return view('livewire.calendar');
    }
}
