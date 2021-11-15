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

    public function delete(Request $request)
    {
        echo "hi".$request->name;
    }
}
