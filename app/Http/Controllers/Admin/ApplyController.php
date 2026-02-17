<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Apply;

class ApplyController extends Controller
{
    public function index()
    {
        $apply = Apply::with([
            'loker.perusahaanMitra',
            'pencariKerja'
        ])->get();

        return view('view_admin.history-apply-admin', compact('apply'));
    }
}