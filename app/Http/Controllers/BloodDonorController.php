<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BloodDonorController extends Controller
{
    public function showDonors()
    {
        $donors = \DB::table('users')
            ->join('user_details', 'users.id', '=', 'user_details.user_id')
            ->select('users.name', 'user_details.blood_group', 'user_details.donate_status',
                'user_details.donate_count', 'user_details.last_donate')
            ->get();
        ;
        return view('admin.donors', ['donors' => $donors]);
    }
}
