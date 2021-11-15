<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        $users = \DB::table('users')->orderBy('id', 'desc')->get();
        return view('admin.user', [ 'users' => $users]);
    }

    public function delete(Request $request)
    {
        echo "hi".$request->name;
    }
}
