<?php

namespace App\Http\Controllers;

use App\Models\Register;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }

   public function authenticate(Request $request)
    {
        $user = Register::where('email', $request->email)->first();

        if ($user && $user->password === $request->password) {
            // Store user info in session
        session([
            'user_id' => $user->id,
            'user_name' => $user->name,
            'user_role' => $user->role, // save role in session
        ]);
            // Store user info and role in cookie as JSON
            $cookieData = json_encode([
                'email' => $user->email,
                'name'  => $user->name,
                'role'  => $user->role,
            ]);
            $cookie = cookie('user', $cookieData, 60); // 60 minutes

            // Redirect based on role
            if ($user->role === 'admin') {
                return redirect('/admin-dashboard')->withCookie($cookie)
                            ->with('success', 'Welcome Admin!');
            } else {
                return redirect('/home')->withCookie($cookie)
                            ->with('success', 'Welcome User!');
            }
        }

        return back()->withErrors([
            'email' => 'Invalid email or password.',
        ]);
    
    }
    public function getCookies(Request $request)
    {
        $user = $request->cookie('user');
        if(strlen($user) == 0){
            return redirect('/cookie');
        }
        else{
            // return view('profile',compact('user'));
            echo "no cookies";

        }
    }
    public function logOut(){
        $cookie = Cookie::forget('user');
        // $cookie = cookie('user', null, -1);
        return redirect('/home')->withCookie($cookie);
    }
}

