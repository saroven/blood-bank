<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BloodRequest extends Controller
{
    public function index()
    {
        return view('admin.BloodRequest.view');
    }
}
