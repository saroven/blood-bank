<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Illuminate\Http\Request;
use mysql_xdevapi\Exception;

class HomeController extends Controller
{
    public function index()
    {
        $districts = DB::table('districts')->get();
        return view('public.index', ['districts' => $districts]);
    }

    public function findDonors(Request $request)
    {
        $districts = DB::table('districts')->get();
        $request->validate([
            'district' => 'required|integer|min:0',
            'blood_group' => 'required|string|min:0|max:5'
        ]);
        $searchData = DB::table('users')
            ->where('user_details.district_id', $request->district)
            ->where('user_details.blood_group', $request->blood_group)
            ->join('user_details', 'users.id', '=', 'user_details.user_id')
            ->join('districts', 'user_details.district_id', '=', 'districts.id')
            ->select('users.name', 'user_details.blood_group', 'user_details.mobile', 'user_details.last_donate',
             'user_details.donate_status', 'districts.name as district_name')
            ->get();

        return view('public.blood-donors', ['searchData' => $searchData, 'districts' => $districts, 'oldDistrict' => $request->district, 'oldBlood_group' => $request->blood_group]);
    }
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

    public function showBloodRequest()
    {
        $requests = DB::table('blood_request')
            ->where('blood_request.status', '=', 0)
            ->join('users', 'blood_request.user_id', '=', 'users.id')
            ->join('districts', 'blood_request.district_id', '=', 'districts.id')
            ->select('blood_request.id as request_id', 'blood_request.blood_group', 'blood_request.number_of_bags', 'blood_request.need_date', 'blood_request.mobile', 'blood_request.location', 'blood_request.comment', 'blood_request.created_at as request_date', 'districts.name as district_name', 'users.name as requester_name')
            ->get();
        return view('public.blood-seeking-requests', ['requests' => $requests]);
    }

    public function donateBlood(Request $request)
    {
        if (Auth::check()){
            $user_details = DB::table('user_details')
                ->where('user_id', Auth::user()->id)
                ->first();
            return $user_details;
        }else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
}
