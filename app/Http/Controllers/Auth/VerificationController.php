<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */
    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function show(Request $request)
    {
        return view('auth.verify');
    }

    public function verify(EmailVerificationRequest $request)
    {
        $user = $request->user();

        if (! $user instanceof MustVerifyEmail) {
            return redirect($this->redirectTo);
        }

        $request->fulfill();

        return redirect($this->redirectTo);
    }

    public function resend(Request $request)
    {
        $user = $request->user();

        if (! $user instanceof MustVerifyEmail) {
            return redirect($this->redirectTo);
        }

        if ($user->hasVerifiedEmail()) {
            return redirect($this->redirectTo);
        }

        $user->sendEmailVerificationNotification();

        return back()->with('resent', true);
    }
}
