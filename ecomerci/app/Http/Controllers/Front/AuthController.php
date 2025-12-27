<?php

namespace App\Http\Controllers\Front;

use App\Events\UserRegistered;
use App\Http\Controllers\Controller;
use App\Http\Requests\Front\Auth\ForgotPasswordRequest;
use App\Http\Requests\Front\Auth\LoginRequest;
use App\Http\Requests\Front\Auth\OTPForgetPasswordRequest;
use App\Http\Requests\Front\Auth\OTPRequest;
use App\Http\Requests\Front\Auth\RegisterRequest;
use App\Models\User;
use App\Service\OTP\OTPService;
use App\Service\OTP\OTPServiceInterface;
use App\Service\OTP\SendOTPWithSms;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Show the login page.
     *
     * @return \Illuminate\View\View
     */
    public function showLogin()
    {
        return view('front.page.auth.login');
    }


    /**
     * Handle login logic.
     *
     * @param  \App\Http\Requests\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->only('phone', 'password');

        if (Auth::attempt($credentials, $request->boolean('checkbox'))) {
            return redirect()->intended('user/profile');
        }

        return redirect()->back()->withErrors([
            'phone' => __('auth.password'),
        ]);
    }

    /**
     * Show the registration page.
     *
     * @return \Illuminate\View\View
     */
    public function showRegister()
    {
        return view('front.page.auth.register');
    }

    /**
     * Handle registration logic.
     *
     * @param  \App\Http\Requests\RegisterRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function register(RegisterRequest $request)
    {

        $user = new \stdClass();
        $user->first_name = $request->first_name;
        $user->last_name  = $request->last_name;
        $user->phone      = $request->phone;
        $user->password   = $request->password;
        session(['user' => $user]);

        // auth()->login($user);
        return redirect()->route('front.auth.phone-verified');
    }

    /**
     * Show the phone verification page.
     *
     * @return \Illuminate\View\View
     */
    public function showPhoneVerified()
    {
        $user = session('user');
        event(new UserRegistered($user));
        return view('front.page.auth.phone-verified');
    }

    /**
     * Handle phone verification logic.
     *
     * @param  \App\Http\Requests\OTPRequest  $request
     * @param  \App\Services\OTPServiceInterface  $oTPService
     * @param  \App\Services\SendOTPWithSms  $sendOTPWithSms
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\RedirectResponse
     */
    public function phoneVerified(OTPRequest $request, 
        OTPServiceInterface $oTPService, 
        SendOTPWithSms $sendOTPWithSms)
    {
      // Find the authenticated user
      $user = session('user');

      // Check if an OTP exists for the user
      if (!$oTPService->otpExists($user->phone)) {
          // Send a new OTP via SMS
          $sendOTPWithSms->handle($user, "register");
          return redirect()->back()->with("error", __('messages.sms.expired'));
      }

      // Validate the provided OTP
      if ($oTPService->validateOTP($user->phone, $request->code)) {
          // Mark the phone number as verified
         $userCreate = User::create([
            'first_name'        => $user->first_name,
            'last_name'         => $user->last_name,
            'phone'             => $user->phone,
            'phone_verified_at' => now(),
            'password'          => Hash::make($user->password),
         ]);
         auth()->login($userCreate);
          return redirect()->route('front.user.profile');
        }

      // If OTP validation fails, return an error
      return redirect()->back()->with("error", __('messages.sms.error'));
    }

    /**
     * Show the forgot password page.
     *
     * @return \Illuminate\View\View
     */
    public function showForgotPassword()
    {
        return view('front.page.auth.forgot-password');
    }

    /**
     * Show the forgot password page.
     *
     * @return \Illuminate\View\View
     */
    public function forgotPassword(ForgotPasswordRequest $request,SendOTPWithSms $sendOTPWithSms)
    {
        $user = User::where('phone', $request->phone)->first();
        if (!$user) {
            return redirect()->back()->with("error", __('auth.forgotPassword'));
        }
        $sendOTPWithSms->handle($user, "register");
        return redirect()->route('front.auth.phone-verified-forget-password', ["phone" => $request->phone])->with("phone", __('messages.sms.success'));
        
    }
    /**
     * Show the forgot password page.
     *
     * @return \Illuminate\View\View
     */
    public function showPhoneVerifiedForgetPassword()
    {
       return view('front.page.auth.phone-verified-forget-password');
    }

    /**
     * Show the forgot password page.
     *
     * @return \Illuminate\View\View
     */
    public function phoneVerifiedForgetPassword(OTPForgetPasswordRequest $request, 
            OTPServiceInterface $oTPService, 
            SendOTPWithSms $sendOTPWithSms,
            User $user
        )
    {
        $user = $user->where('phone', $request->phone)->first();
        if (!$user) {
            return redirect()->back()->with("error", __('auth.forgotPassword'));
        }

        // Check if an OTP exists for the user
        if (!$oTPService->otpExists($user->phone)) {
            // Send a new OTP via SMS
            $sendOTPWithSms->handle($user, "forgot-password");
            return redirect()->back()->with("error", __('messages.sms.expired'));
        }

        // Validate the provided OTP
        if ($oTPService->validateOTP($user->phone, $request->code)) {
            // Mark the phone number as verified
            auth()->login($user);
            return redirect()->route('front.user.profile');
        }

        // If OTP validation fails, return an error
        return redirect()->back()->with("error", __('messages.sms.error'));
    }

     /**
     * Show the reset password page.
     *
     * @return \Illuminate\View\View
     */
    public function resetPassword()
    {
        return view('front.page.auth.reset-password');
    }


    /**
     * Log the user out and invalidate the session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }

}
