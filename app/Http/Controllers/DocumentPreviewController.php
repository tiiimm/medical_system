<?php

namespace App\Http\Controllers;

use App\Models\DocumentType;
use App\Models\User;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Crypt;

class DocumentPreviewController extends Controller
{
    public function preview(Request $request)
    {
        $data = Crypt::decrypt(request()->get('token'));
        $data['system'] = auth()->user()->SystemSetting;
        
        $pdf = Pdf::loadView('pdf.'.$data['document'], $data)->setPaper([0, 0, $data['width'] * 72, $data['height'] * 72])->setOption('margin-top', 0)
           ->setOption('margin-bottom', 0)
           ->setOption('margin-left', 0)
           ->setOption('margin-right', 0);

        return $pdf->stream($data['document'].'.pdf');
    }
}
