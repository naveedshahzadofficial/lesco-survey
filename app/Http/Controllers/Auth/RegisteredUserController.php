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
use Inertia\Inertia;
use Inertia\Response;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        return Inertia::render('Auth/Register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'phone_no' => 'required|numeric|digits:11',
            'job_title' => 'required|string|max:255',
            'office_location' => 'required|string|max:255',
        ]);

        $user = User::firstOrCreate(
            ['phone_no' => $request->phone_no,],
            [
            'name' => $request->name,
            'job_title' => $request->job_title,
            'office_location' => $request->office_location,
        ]);

        if(!$user->wasRecentlyCreated && $user->is_submitted) {
            session()->flash('error', 'Your Feedback already has been submitted.');
            return redirect()->route('register');
        }
        $user->assignRole('user');
        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
