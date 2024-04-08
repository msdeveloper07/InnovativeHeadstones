<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Mail\SendPassword;
use Illuminate\Support\Facades\Mail;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            // 'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $password = $this->randomPassword();
        // $password = '12345678';
        $this->sendEmail($request->email, $password);

        $explode = explode("@",$request->email);
        array_pop($explode);
        $username = join('@', $explode);

        $user = User::create([
            'name' => $username,
            'email' => $request->email,
            'password' => Hash::make($password),
        ]);

        event(new Registered($user));

        //Auth::login($user);
        return redirect('/login')->with('success', 'We sent your password on mail please check and log in.');
        //return redirect(RouteServiceProvider::HOME);
    }

    /*** Send Email ***/
    public function sendEmail($email_address, $password)
    {
        $email_data = [
            "email" => $email_address,
            "password" => $password
        ];
        $email = new SendPassword($email_data);
        Mail::to($email_address)->send($email);
        return "Email sent successfully!";
    }

    /*** Generate Random Password ***/
    public function randomPassword() {
        $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890!@#$%&^*()';
        $pass = array();
        $alphaLength = strlen($alphabet) - 1;
        for ($i = 0; $i < 12; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass);
    }
}
