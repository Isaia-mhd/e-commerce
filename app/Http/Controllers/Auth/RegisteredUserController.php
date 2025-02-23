<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $countries = Country::all();
        return view('auth.register', compact("countries"));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {

        // Validate the request
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'compagny' => ['required', 'string'],
            'phone' => ['required', 'string', 'max:20'],
            'country' => ['required', 'string', 'max:50'],
            'region' => ['required', 'string', 'max:50'],
            'city' => ['required', 'string', 'max:50'],
            'postal_code' => ['required', 'string', 'max:10'],
            'password' => ['required', 'confirmed', Rules\Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
        ],

        ]);

        // Store the user to database
        User::create([
           "name" => $request->name,
           "email" => $request->email,
           "compagny" => $request->compagny,
           "phone" => $request->phone,
           "country" => $request->country,
           "region" => $request->region,
           "city" => $request->city,
           "postal_code" => $request->postal_code,
           "password" => Hash::make($request->password)
        ]);

        // event(new Registered($user));

        return redirect()->route("home")->with("success", "Registered successfully!");
    }
}
