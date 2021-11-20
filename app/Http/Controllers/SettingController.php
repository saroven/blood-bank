<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        return view('admin.settings');
    }
    public function update(Request $request)
    {
        $siteInfo = \DB::table('site_info')->first();
//        return $request;
        if($siteInfo){
            //have data

        }else{
            //don't have data
            $request->validate([
                'site_title' => 'required|string|min:2|max:50',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:11',
                'address' => 'required|string|max:255',
                'logo' => 'sometimes|required|file',
            ]);
            \DB::table('site_info')
                ->insert([
                    'site_title' => $request->site_title,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'address' => $request->address,
                    'logo' => $request->logo
                ]);
            return 'all ok';
        }
    }
}
