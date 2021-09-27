<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Password;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Support\Facades\Auth;

class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:admin');
    }

    
    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker('admin_users');
    }

    /**
     * Show the application's link request form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLinkRequestForm()
    {
        if (Auth::guard('admin')->check()) {
            return redirect()->intended($this->redirectPath());
        }

        return view('admin.auth.passwords.email');
    }

}
