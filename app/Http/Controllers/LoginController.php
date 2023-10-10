<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $request->validate([
            'user_name' => 'string|required',
            'password' => 'string|required'
        ]);
        // dd('in');
        $user = User::where('name', $request->user_name)->first();
       

        if($user){
            if (Hash::check($request->password, $user->password)) {

                Auth::login($user);
                if (auth()->user()->hasRole("Head-Office")) {
                    return redirect('/main-dashboard');
                }else if(auth()->user()->hasRole("Employee")){
                    return redirect('/tokens');
                }
                return redirect('/dashboard');
            }
        }else{
            return redirect('/register')->with('error', 'Username or  password Incorrect.');
        }

        return redirect('/register')->with('error', 'Username or  password Incorrect.');
    }

    public function logout(Request $request)
    {
        $user = auth()->user();
        Auth::logout($user);

        return redirect('/register');
    }
}
