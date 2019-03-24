<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;

class AuthController extends Controller
{
    public function login()
    {
    	return view('auth.login');
    }

    public function postlogin(Request $request)
    {
    	if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
    		return redirect()->route('dashboard');
    	}
    	return redirect()->route('login')
            ->with('error','Email/Password yang anda masukan salah');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }

    public function register()
    {
        return view('auth.register');
    }

     public function insertadmin(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|min:5',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:5|confirmed'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        return redirect('/pengaturan');
    }

    public function hapusadmin(Request $request)
    {
        $admin = User::find($request->id);
        $admin->delete();
        return redirect()->route('pengaturan');
    }
}
