<?php

namespace App\Http\Controllers\company\Auth;

use App\Http\Controllers\Controller;
use App\Http\Middleware\company;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class CompanyRegController extends Controller
{
    /**
     * Display the registration view.
     */
    public function showRegisterForm()
    {
        return view('company.auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $company = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
             
        ]);
            $company->usertype = 'company';
            $company->save();

        event(new Registered($company));

         Auth::guard('company')->login($company);

        return redirect(route('company.dashboard'));
    }
}
