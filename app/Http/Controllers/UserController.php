<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        return view('admin.users.home',['users' => User::all()]);
    }

    public function show($id)
    {
        return view('admin.users.show',['users' => User::find($id)]);
    }
    public function create()
    {

        return view('admin.users.create');
    }
    public function store(Request $request)
    {
        
            $request->validate([
                "name" => "required",
                "email" => "required|email",
                "password" => "min:8|max:16|confirmed",
            ]);
            
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect('/users');
        
        
    }
}
