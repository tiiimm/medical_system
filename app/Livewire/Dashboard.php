<?php

namespace App\Livewire;

use App\Models\MedicalResults;
use Livewire\Component;

class Dashboard extends Component
{
    public $first_access = false;
    public $totalStudentMedicalCount;
    
    public $healthyStudentsCount;
    public $uticasesCount;
    public $drugPositiveCount;
    public $leukemiaStudentsCount;
    public $lowPlateletsStudentsCount;
    public $kidneyStudentsCount;
    public $diabetesStudentsCount;
    public $pneumoniaStudentsCount;
    public $tbStudentsCount;

    public function mount()
    {
        if (!auth()->user()->hasProfile()) {
            return $this->redirect('/setup-account', navigate: true);
        }
        $this->first_access = session('first_access')??false;
        $this->totalStudentMedicalCount = MedicalResults::count();

        // $this->healthyStudentsCount = MedicalResults::where('hematology_result', 'normal')
        //     ->where('urinalysis_result', 'normal')
        //     ->where('xray_result', 'normal')
        //     ->where('drugtest_result', 'negative')
        //     ->where('school_year', now()->month <= 6 ? (now()->year - 1) . '-' . now()->year : now()->year . '-' . (now()->year + 1))
        //     ->where('semester', now()->month <= 6 ? '2nd sem' : '1st sem')
        //     ->count();

        // $this->uticasesCount = MedicalResults::where('urinalysis_abnormality', 'uti')
        //     ->where('school_year', now()->month <= 6 ? (now()->year - 1) . '-' . now()->year : now()->year . '-' . (now()->year + 1))
        //     ->where('semester', now()->month <= 6 ? '2nd sem' : '1st sem')
        //     ->with('appointment.student_information')
        //     ->get()
        //     ->groupBy('appointment.student_information.campus_id')
        //     ->mapWithKeys(function ($items, $campusId) {
        //         return [$campusId => $items->count()]; // Count items per campus
        //     });

        // $this->drugPositiveCount = MedicalResults::where('drugtest_result', 'positive')
        //     ->where('school_year', now()->month <= 6 ? (now()->year - 1) . '-' . now()->year : now()->year . '-' . (now()->year + 1))
        //     ->where('semester', now()->month <= 6 ? '2nd sem' : '1st sem')
        //     ->with('appointment.student_information')
        //     ->get()
        //     ->groupBy('appointment.student_information.campus_id')
        //     ->mapWithKeys(function ($items, $campusId) {
        //         return [$campusId => $items->count()]; // Count items per campus
        //     });

        // $this->leukemiaStudentsCount = MedicalResults::where('hematology_abnormality', 'leukemia')
        //     ->where('school_year', now()->month <= 6 ? (now()->year - 1) . '-' . now()->year : now()->year . '-' . (now()->year + 1))
        //     ->where('semester', now()->month <= 6 ? '2nd sem' : '1st sem')
        //     ->count();

        // $this->lowPlateletsStudentsCount = MedicalResults::where('hematology_abnormality', 'low_platelets')
        //     ->where('school_year', now()->month <= 6 ? (now()->year - 1) . '-' . now()->year : now()->year . '-' . (now()->year + 1))
        //     ->where('semester', now()->month <= 6 ? '2nd sem' : '1st sem')
        //     ->count();

        // $this->kidneyStudentsCount = MedicalResults::where('urinalysis_abnormality', 'kidney_disease')
        //     ->where('school_year', now()->month <= 6 ? (now()->year - 1) . '-' . now()->year : now()->year . '-' . (now()->year + 1))
        //     ->where('semester', now()->month <= 6 ? '2nd sem' : '1st sem')
        //     ->count();
        
        // $this->diabetesStudentsCount = MedicalResults::where('urinalysis_abnormality', 'diabetes')
        //     ->where('school_year', now()->month <= 6 ? (now()->year - 1) . '-' . now()->year : now()->year . '-' . (now()->year + 1))
        //     ->where('semester', now()->month <= 6 ? '2nd sem' : '1st sem')
        //     ->count();
        
        // $this->pneumoniaStudentsCount = MedicalResults::where('xray_abnormality', 'pneumonia')
        //     ->where('school_year', now()->month <= 6 ? (now()->year - 1) . '-' . now()->year : now()->year . '-' . (now()->year + 1))
        //     ->where('semester', now()->month <= 6 ? '2nd sem' : '1st sem')
        //     ->count();
        
        // $this->tbStudentsCount = MedicalResults::where('xray_abnormality', 'tuberculosis')
        //     ->where('school_year', now()->month <= 6 ? (now()->year - 1) . '-' . now()->year : now()->year . '-' . (now()->year + 1))
        //     ->where('semester', now()->month <= 6 ? '2nd sem' : '1st sem')
        //     ->count();
        
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
