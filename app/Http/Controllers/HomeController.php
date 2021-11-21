<?php

namespace App\Http\Controllers;

use App\Models\bloodRequest;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $activeRequest = BloodRequest::where('status', 0)->get();
        $resolveRequest = BloodRequest::where('status', 1)->get();
        $users = User::all();
        $data = [
            'activeRequest' => $activeRequest,
            'resolveRequest' => $resolveRequest,
            'users' => $users
        ];
        return view('admin.home', compact('data'));
    }
}
