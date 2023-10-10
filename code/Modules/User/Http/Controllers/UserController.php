<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request)
    {
        return view('user::register');

    }

    public function registerPost(Request $request)
    {
        // 
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
        $params = $request->except('_token');
        $params['password'] = md5($request->password);
        // Create user
        $user = User::create($params);
        return redirect('user/login')->with('success', 'You are now registered');
    }
    public function login()
    {
        return view('user::login');
    }

    public function postLogin(Request $request)
    {
        // Validate login credentials
        $validatedData = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        // Authenticate user
        $password = md5($request->password);
        $user = User::where([['email', $request->email],['password',$password]])->first();
        // dd($user);
        if(!$user)
            return redirect('user/login')->with('error', 'Invalid Credentials');
        
        session(['user'=> $user->id]);
        return redirect('')->with('success', 'You are logged in');
    }

    public function dashboard(Request $request)
    {
        // Retrieve logged in user from session
        $userId = session('user');
        dump($userId);
        $user = User::find($userId);
        dd($user);
    }
}
