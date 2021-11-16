<?php

namespace App\Http\Controllers;

use App\Models\bloodRequest;
use App\Models\UserDetail;
use Illuminate\Http\Request;

class BloodRequestController extends Controller
{
    public function index()
    {
        $requests = BloodRequest::all();
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
}
