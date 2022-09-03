<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;
use Illuminate\Validation\Rules;
use Throwable;

class ChangePasswordController extends Controller
{
    /**
     * Adiministrative function which returns a confirmation page for the
     * admin password reset flow.
     *
     * @param Request $request The incoming request
     * @param User $user The User whose password needs resetting
     * @return void
     */
    public function approveReset(Request $request, User $user)
    {
        if ($request->user()->cannot('update', $user)) {
            return abort(403);
        }

        return view('users.approve-reset')->with(compact('user'));
    }

    /**
     * Administrative function allowing direct password resets for users by
     * administrators. The password is set to 'password' and the password_reset
     * flag is set to 'true' which will force the user to change the password
     * upon successful login or any page navigation.
     *
     * @param Request $request The incoming request
     * @param User $user The User whose password will be reset
     * @return void
     */
    public function adminReset(Request $request, User $user)
    {
        if ($request->user()->cannot('update', $user)) {
            return abort(403);
        }

        $user->forceFill([
            'password' => Hash::make('password'),
            'password_reset' => true,
        ])->save();

        $users = User::all();

        return view('users.index')->with(compact('users'));
    }

    /**
     * Show the confirm password view.
     *
     * @return \Illuminate\View\View
     */
    public function show()
    {
        return view('auth.change-password');
    }

    /**
     * Handle an incoming new password request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $request->validate([
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = $request->user();
        try {
            $user->forceFill([
                'password' => Hash::make($request->password),
                'remember_token' => Str::random(60),
                'password_reset' => false,
            ])->save();
            $status = true;
            event(new PasswordReset($user));
        } catch (Throwable $e) {
            Log::error("Failed to change user password", [$e]);
            $status = false;
        }


        // Here we will attempt to reset the user's password. If it is successful we
        // will update the password on an actual user model and persist it to the
        // database. Otherwise we will parse the error and return the response.
        // $status = Password::reset(
        //     $request->only('email', 'password', 'password_confirmation', 'token'),
        //     function ($user) use ($request) {
        //         $user->forceFill([
        //             'password' => Hash::make($request->password),
        //             'remember_token' => Str::random(60),
        //         ])->save();

        //         event(new PasswordReset($user));
        //     }
        // );

        // If the password was successfully reset, we will redirect the user back to
        // the application's home authenticated view. If there is an error we can
        // redirect them back to where they came from with their error message.

        return $status
            ? view('auth.change-password')->with(['status' => true])
            : back()->withErrors(compact('status'));
        // return $status
        //     ? back()->with(compact('status'))
        //     : back()->with(compact('status'))
        //     ->withErrors(['password' => __($status)]);
    }
}
