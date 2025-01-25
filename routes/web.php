<?php

use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\CampusList;
use App\Livewire\CollegeList;
use Illuminate\Support\Facades\Route;
use App\Livewire\Dashboard;
use App\Livewire\UserManagement;
use App\Livewire\UserProfile;
use App\Livewire\Landing;
use App\Livewire\MedicalLookup;
use App\Livewire\StudentList\MedicalRecords;
use App\Livewire\MedicalStaffList;
use App\Livewire\MedicalStaffList\EditMedicalStaff;
use App\Livewire\MedicalStaffList\NewMedicalStaff;
use App\Livewire\MedicalStatus;
use App\Livewire\Notifications;
use App\Livewire\Profile;
use App\Livewire\SetupAccount;
use App\Livewire\StaticSignIn;
use App\Livewire\StaticSignUp;
use App\Livewire\StudentList;
use App\Livewire\StudentList\NewMedicalResult;
use App\Livewire\ProgramList;
use App\Livewire\AppointmentHistory;
use App\Livewire\BookAppointment;
use App\Livewire\AppointmentList;
use App\Livewire\SystemSettings;
use App\Livewire\AppointmentList\AppointmentResult;

Route::get('/', Landing::class)->middleware('guest')->name('landing');

Route::get('forgot-password', ForgotPassword::class)->middleware('guest')->name('password.forgot');
Route::get('reset-password/{id}', ResetPassword::class)->middleware('signed')->name('reset-password');

Route::get('medical-lookup', MedicalLookup::class)->name('medical-lookup');
Route::get('medical-status/{encryptedId}', MedicalStatus::class)->name('medical-status');
Route::get('sign-up', Register::class)->middleware('guest')->name('register');
Route::get('sign-in', Login::class)->middleware('guest')->name('login');

Route::group(['middleware' => 'auth'], function () {
    Route::get('setup-account', SetupAccount::class)->name('setup-account');
    
    Route::group(['middleware' => function ($request, $next) {
        if (auth()->check() && is_null(auth()->user()->username)) {
            return redirect()->route('setup-account');
        }

        return $next($request);
    }], function () {
        Route::get('system-settings', SystemSettings::class)->name('system-settings');
        Route::get('user-profile', UserProfile::class)->name('user-profile');
        Route::get('user-management', UserManagement::class)->name('user-management');
        Route::get('campus-list', CampusList::class)->name('campus-list');
        Route::get('college-list', CollegeList::class)->name('college-list');
        Route::get('program-list', ProgramList::class)->name('program-list');

        Route::get('medical-staff-list', MedicalStaffList::class)->name('medical-staff-list');
        Route::get('medical-staff-list/new-medical-staff', NewMedicalStaff::class)->name('medical-staff-list/new-medical-staff');
        Route::get('medical-staff-list/edit-medical-staff', EditMedicalStaff::class)->name('medical-staff-list/edit-medical-staff');

        Route::get('student-list', StudentList::class)->name('student-list');
        Route::get('student-list/new-medical-result', NewMedicalResult::class)->name('student-list/new-medical-result');
        Route::get('student-list/medical-records', MedicalRecords::class)->name('student-list/medical-records');
        
        Route::get('appointment-list', AppointmentList::class)->name('appointment-list');
        Route::get('appointment-list/result', AppointmentResult::class)->name('appointment-list/result');
        
        Route::get('appointment-history', AppointmentHistory::class)->name('appointment-history');
        Route::get('book-appointment', BookAppointment::class)->name('book-appointment');

        Route::get('medical-records', MedicalRecords::class)->name('medical-records');
        Route::get('dashboard', Dashboard::class)->name('dashboard');
        Route::get('profile', Profile::class)->name('profile');
        Route::get('notifications', Notifications::class)->name("notifications");
        Route::get('static-sign-in', StaticSignIn::class)->name('static-sign-in');
        Route::get('static-sign-up', StaticSignUp::class)->name('static-sign-up');
    });
});