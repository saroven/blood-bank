<?php

namespace App\Http\Controllers;

use App\Models\bloodRequest;
use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Http\Request;

class BloodRequestController extends Controller
{
    public function index()
    {
        $requests = \DB::table('blood_request')
            ->join('users', 'blood_request.user_id', '=', 'users.id')
            ->join('districts', 'blood_request.district_id', '=', 'districts.id')
            ->select('blood_request.*', 'districts.name as district_name')
            ->get();

        return view('admin.BloodRequest.view', ['requests' => $requests]);
    }

    public function filter(Request $request)
    {
        if ($request->status == 'active'){
            $status = 0;
        }elseif ($request->status == 'resolved'){
            $status = 1;
        }else{
            return redirect()->route('dashboard');
        }
        $requests = \DB::table('blood_request')
            ->where('blood_request.status', $status)
            ->join('users', 'blood_request.user_id', '=', 'users.id')
            ->join('districts', 'blood_request.district_id', '=', 'districts.id')
            ->select('blood_request.*', 'districts.name as district_name')
            ->get();
        return view('admin.BloodRequest.view', ['requests' => $requests]);
    }

    public function details(Request $request)
    {
        try {
            $data = \DB::table('blood_request')
            ->where('blood_request.id', $request->id)
            ->join('users', 'blood_request.user_id', '=', 'users.id')
            ->join('districts', 'blood_request.district_id', '=', 'districts.id')
            ->select('blood_request.*', 'users.name as username', 'districts.name as district_name')
            ->first();

            return view('admin.BloodRequest.single', ['data' => $data]);

        }catch (\Exception $ex){
            \Log::error($ex);
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function edit(Request $request)
    {
        $data = \DB::table('blood_request')->where('id', $request->id)->first();
        $donated_by = null;
        if ($data->donated_by) {
            $donated_user = \DB::table('users')->where('id', $data->donated_by)->first();
            $donated_by = $donated_user->name;
        }
        $requested_user = \DB::table('users')->where('id', $data->user_id)->first();
        if (!$data){
            return redirect()->route('dashboard');
        }else{
            $users = \DB::table('users')
                ->where('id', '!=', $data->user_id)
                ->select('id', 'name')
                ->get();
            return view('admin.BloodRequest.edit', ['data' => $data, 'users' => $users, 'requested_by' => $requested_user->name, 'donated_by' => $donated_by]);
        }
    }

    public function update(Request $request)
    {
        $request->validate([
            'donated_by' => 'required|integer',
            'request_id' => 'required|integer',
            'donated_date' => 'required|date',
        ]);

        try {
            $userDetails = \DB::table('user_details')
                ->where('user_id', $request->donated_by)
                ->first();
            \DB::table('user_details')
                ->where('user_id', $request->donated_by)
                ->update([
                    'donate_count' => $userDetails->donate_count + 1,
                    'last_donate' => $request->donated_date
                    ]);

            \DB::table('blood_request')
                ->where('id', $request->request_id)
                ->update([
                    'donated_by'=>$request->donated_by,
                    'donated_date'=> $request->donated_date,
                    'status' => 1
                ]);

            return redirect()->back()->with('success', 'Updated Successful!');
        }catch (\Exception $exception){
            \Log::error($exception);
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
}
