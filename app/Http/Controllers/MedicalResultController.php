<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MedicalResults;


class MedicalResultController extends Controller
{
    public function viewAll($id)
    {
        $record = MedicalResults::find($id);
        if ($record == null) {
            return redirect()->route('dashboard')->with('error', 'Booking appointments is disabled.');
        }
        $user = auth()->user();

        $isMedicalStaff = $user->hasRole('medical staff');
        $isStudentOwner = $user->hasRole('student') && $user->id === $record->user_id;

        if (!$isMedicalStaff && !$isStudentOwner) {
            return redirect()->route('dashboard')->with('error', 'Booking appointments is disabled.');
        }

        $files = json_decode($record->result_file_path, true);
        return view('medical_results.view_all', compact('files'));
    }
}
