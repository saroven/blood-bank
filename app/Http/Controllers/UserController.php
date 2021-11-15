<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserDetail;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function index(){
        $users = \DB::table('users')->orderBy('id', 'desc')->get();
        return view('admin.user.view', [ 'users' => $users]);
    }
    public function addPage(){
        return view('admin.user.add');
    }
    public function addUser(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6'],
            ]);
        try {
            $user = User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
                ]);
            UserDetail::create(['user_id' => $user->id]);
            return redirect()->back()->with('success', 'User Created Successful.');
        }catch (\Exception $ex){
            Log::error($ex);
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function editPage(Request $request)
    {
        $user = User::findOrFail($request->id);
        return view('admin.user.edit', ['user' => $user]);
    }

    public function updateUser(Request $request)
    {
        $user = User::findOrFail($request->id);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
            ]);
        if (!empty($request->password)){
            $request->validate([
                'password' => ['required', 'string', 'min:6']
            ]);
        }
        try {
            $data = array(
                'name' => $request->name,
                'email' => $request->email,
                'password' => $request->password ? Hash::make($request['password']) : $user->password
            );
            User::where('id', $request->id)->update($data);
            return redirect()->back()->with('success', 'User information updated Successful.');
        }catch (\Exception $ex){
            Log::error($ex);
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }

    public function delete(Request $request)
    {
        try {
            User::findOrFail($request->id);
            User::where('id', $request->id)->delete();
            return redirect()->back()->with('success', 'Deleted Successful');
        }catch (\Exception $ex){
            Log::error($ex);
            return redirect()->back()->with('error', 'Something went wrong!');
        }
    }
}
