<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class CustomLoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return view();
    }

    public function customShowLoginForm()
    {
        return view('custom-login');
    }
    public function showResetForm(Request $request, $token)
    {
        $email = $request->query('email');
        return view('custom-password-reset', ['email' => $email, 'token' => $token]);
    }
    public function customPasswordUpdate(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        $status = Password::reset($request->only('email', 'password', 'password_confirmation', 'token'), function (User $user, $password) {
            $user->forceFill([
                'password' => Hash::make($password)
            ])->setRememberToken(Str::random(40));
            $user->save();
        });

        if ($status === Password::PASSWORD_RESET) {
            
            return redirect()->route('custom.login')->with(['status' => __($status)]);
        }else{
            return back()->withErrors(['email' => __($status)]);
        }
    }
    //*** Custom Login Method ***
    public function customLogin(Request $request)
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            return redirect()->route('admin.posts.index');
        }
        return redirect()->route('custom.login');
    }
    //*** Custom Logout Method ***
    public function customlogout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('custom.login');
    }
    //*** Show reset form ***
    public function customShowLink()
    {
        return view('custom-show-link-form');
    }
    // reset password
    public function customResetPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|email'
        ]);

        $status = Password::sendResetLink($request->only('email'));
        if ($status === Password::RESET_LINK_SENT) {
            return back()->with(['status' => __($status)]);
        } else {
            return back()->withErrors(['email' => __($status)]);
        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
