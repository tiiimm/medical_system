<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\MedicalResults;


class MedicalResultController extends Controller
{
    public function viewAll($id)
    {
        $record = MedicalResults::findOrFail($id);
        $files = json_decode($record->result_file_path, true);
        return view('medical_results.view_all', compact('files'));
    }
}
