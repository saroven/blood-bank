<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $siteInfo = \DB::table('site_info')->first();
        return view('admin.settings', ['siteInfo' => $siteInfo]);
    }
    public function update(Request $request)
    {
        $siteInfo = \DB::table('site_info')->first();
        if($siteInfo){
            //have data

            $request->validate([
                'site_title' => 'required|string|min:2|max:50',
                'email' => 'required|email|max:255',
                'phone' => 'required|string|max:11',
                'address' => 'required|string|max:255',
                'logo' => 'required|image|mimes:jpg,png,jpeg,gif',
            ]);

//            $filePath = $request->file('logo')->storeAs(
//                'logo',
//                $fileName,
//                'public'
//            );
            $oldImage = public_path('logo'). ''.$siteInfo->logo;

//            if (\File::exists($siteInfo->logo)){
//                return 'has file';
//            }else{
//                return 'no file';
//            }
            if ($request->logo != null){
                $fileName = time().'_logo.'.$request->logo->getClientOriginalExtension();
                $request->logo->move(public_path('logo'), $fileName);
            }

            \DB::table('site_info')
                ->where('id', 1) //update first row
                ->update([
                    'site_title' => $request->site_title,
                    'phone' => $request->phone,
                    'email' => $request->email,
                    'address' => $request->address,
                    'logo' => '/logo/'.$fileName
                ]);
            return redirect()->back()->with('success', 'Updated successful');
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
            return redirect()->back()->with('success', 'Inserted successful');
        }
    }
}
