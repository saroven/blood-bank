<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class HomeController extends Controller
{
    public function showProfilePage()
    {
        $districts = \DB::table('districts')->select('id', 'name')->get();
        $loggedUserInfo = \DB::table('user_details')
            ->where('user_id', \Auth::user()->id)
            ->join('users', 'user_details.user_id', '=', 'users.id')
            ->select('name', 'gender', 'birth_date', 'blood_group', 'district_id', 'donate_status', 'mobile')
            ->first();
        return view('public.profile', ['districts' => $districts, 'userInfo' => $loggedUserInfo]);
    }
    public function updateProfile(Request $request)
    {
        $loggedUser = \Auth::user();
        $request->validate([
            'name' => 'required|string|min:3|max:150',
            'mobile' => 'required|string|min:10|max:11',
            'gender' => 'required|string|max:10',
            'blood_group' => 'required|string|max:10',
            'birth_date' => 'sometimes|required|date',
            'donate_status' => 'required|integer|max:2',
            'district' => 'required|integer|min:0'
        ]);

        try {
            //update user name
        DB::table('users')
            ->where('id', $loggedUser->id)
            ->update(['name' => $request->name]);

        DB::table('user_details')
            ->where('user_id', $loggedUser->id)
            ->update([
                'mobile' => $request->mobile,
                'gender' => $request->gender,
                'blood_group' => $request->blood_group,
                'birth_date' => $request->birth_date,
                'donate_status' => $request->donate_status,
                'district_id' => $request->district
            ]);
             return redirect()->back()->with('success', 'Update successful');
        }catch (\Exception $exception){
            \Log::error($exception);
            return redirect()->back()->with('error', 'Something went wrong!');
        }


    }
}
