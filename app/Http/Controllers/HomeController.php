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
            ->select('users.id', 'users.name', 'user_details.blood_group', 'user_details.mobile', 'user_details.last_donate',
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
        $districts = DB::table('districts')->select('id', 'name')->get();
        $requests = DB::table('blood_request')
            ->where('blood_request.status', '=', 0)
            ->join('users', 'blood_request.user_id', '=', 'users.id')
            ->join('districts', 'blood_request.district_id', '=', 'districts.id')
            ->select('blood_request.id as request_id', 'blood_request.blood_group', 'blood_request.number_of_bags', 'blood_request.need_date', 'blood_request.mobile', 'blood_request.location', 'blood_request.comment', 'blood_request.created_at as request_date', 'districts.name as district_name', 'users.name as requester_name', 'blood_request.status')
            ->get();
        return view('public.blood-seeking-requests', ['requests' => $requests, 'districts' => $districts]);
    }

    public function donateBlood(Request $request)
    {
        if (Auth::check()){
            $donated = DB::table('blood_donation')
                ->where('request_id', $request->id)
                ->first();
            if ($donated != ''){
                return redirect()->back()->with('error', 'Already Placed one request');
            }
            $request_details = DB::table('blood_request')
                ->where('id', $request->id)
                ->first();

            DB::table('blood_donation')
                ->insert([
                    'request_id' => $request->id,
                    'requester_id' => $request_details->user_id,
                    'donor_id' => Auth::user()->id,
                ]);
            return redirect()->back()->with('success', 'Blood Donation Request placed, wait for call');
        }else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function showVolunteer()
    {
        $districts = DB::table('districts')->select('id', 'name')->get();
        $volunteers = DB::table('users')
            ->where('role_id', '!=', '2')
            ->join('user_details', 'users.id', '=', 'user_details.user_id')
            ->join('districts', 'user_details.district_id', '=', 'districts.id')
            ->select('users.name', 'user_details.blood_group', 'user_details.mobile', 'user_details.last_donate',
             'user_details.donate_status', 'user_details.donate_status', 'districts.name as district_name')
            ->get();
        return view('public.volunteer', ['volunteers' => $volunteers, 'districts' => $districts]);
    }
    public function filterVolunteer(Request $request)
    {
        $districts = DB::table('districts')->select('id', 'name')->get();
        $volunteers = DB::table('users')
            ->where('role_id', '!=', '2')
            ->where('user_details.district_id', '=', $request->district)
            ->join('user_details', 'users.id', '=', 'user_details.user_id')
            ->join('districts', 'user_details.district_id', '=', 'districts.id')
            ->select('users.name', 'user_details.blood_group', 'user_details.mobile', 'user_details.last_donate',
             'user_details.donate_status', 'user_details.donate_status', 'districts.name as district_name')
            ->get();
        return view('public.volunteer', ['volunteers' => $volunteers, 'districts' => $districts, 'old' => $request->district]);
    }

    public function addBloodRequest(Request $request)
    {
        $request->validate([
            'blood_group' => 'required|string|min:0|max:10',
            'number_of_bag' => 'required|integer|max:10|min:0',
            'need_date' => 'required|date',
            'district' => 'required|integer',
            'comment' => 'required|string|max:1000',
            'mobile' => 'required|string|min:10|max:11',
            'location' => 'required|string|max:255'
        ]);
        if (Auth::check()){
            DB::table('blood_request')
                ->insert([
                    'user_id' => Auth::user()->id,
                    'blood_group' => $request->blood_group,
                    'number_of_bags' => $request->number_of_bag,
                    'need_date' => $request->need_date,
                    'district_id' => $request->district,
                    'comment' => $request->comment,
                    'mobile' => $request->mobile,
                    'location' => $request->location
                ]);
            return redirect()->back()->with('success', 'Request added successful');
        }else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function myBloodRequests()
    {
        if (Auth::check()){
            $districts = DB::table('districts')->select('id', 'name')->get();
            $requests = DB::table('blood_request')
                ->where('users.id', '=', auth()->user()->id)
                ->join('users', 'blood_request.user_id', '=', 'users.id')
                ->join('districts', 'blood_request.district_id', '=', 'districts.id')
                ->select('blood_request.id as request_id', 'blood_request.blood_group', 'blood_request.number_of_bags', 'blood_request.need_date', 'blood_request.mobile', 'blood_request.location', 'blood_request.comment', 'blood_request.created_at as request_date', 'districts.name as district_name', 'users.name as requester_name', 'blood_request.status')
                ->get();
            return view('public.blood-seeking-requests', ['requests' => $requests, 'districts' => $districts]);
        }else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
    public function receivedBloodRequests()
    {
        if (Auth::check()){
            $districts = DB::table('districts')->select('id', 'name')->get();
            $requests = DB::table('blood_request')
                ->where('blood_request.requested_to', '=', auth()->user()->id)
                ->where('blood_request.status', '=', 0)
                ->join('users', 'blood_request.user_id', '=', 'users.id')
                ->join('districts', 'blood_request.district_id', '=', 'districts.id')
                ->select('blood_request.id as request_id', 'blood_request.blood_group', 'blood_request.number_of_bags', 'blood_request.need_date', 'blood_request.mobile', 'blood_request.location', 'blood_request.comment', 'blood_request.created_at as request_date', 'districts.name as district_name', 'users.name as requester_name', 'blood_request.status')
                ->get();
            return view('public.blood-seeking-requests', ['requests' => $requests, 'districts' => $districts]);
        }else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function sendBloodRequestToDonorPage(Request $request)
    {
        $districts = DB::table('districts')->select('id', 'name')->get();
        return view('public.requestBlood', ['userId' => $request->id, 'districts'=> $districts]);
    }
    public function sendBloodRequestToDonor(Request $request)
    {
        $request->validate([
            'blood_group' => 'required|string|min:0|max:10',
            'number_of_bag' => 'required|integer|max:10|min:0',
            'need_date' => 'required|date',
            'district' => 'required|integer',
            'comment' => 'required|string|max:1000',
            'mobile' => 'required|string|min:10|max:11',
            'location' => 'required|string|max:255'
        ]);
        if (Auth::check()){
            DB::table('blood_request')
                ->insert([
                    'user_id' => Auth::user()->id,
                    'blood_group' => $request->blood_group,
                    'requested_to' => $request->id,
                    'number_of_bags' => $request->number_of_bag,
                    'need_date' => $request->need_date,
                    'district_id' => $request->district,
                    'comment' => $request->comment,
                    'mobile' => $request->mobile,
                    'location' => $request->location
                ]);
            return redirect()->back()->with('success', 'Request added successful');
        }else{
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

}
