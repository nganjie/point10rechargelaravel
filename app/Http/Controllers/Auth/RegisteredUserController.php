<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Models\Client;
use Illuminate\View\View;
use App\Models\Utilisateur;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Auth\Events\Registered;
use App\Providers\RouteServiceProvider;

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
            'nom' => ['required', 'string', 'max:255'],
            "numero"=>["required","int"],
            "ville"=>["required","string"],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.Client::class],
            'password' => ['required', 'confirmed'],
        ]);

        $utilisateur =Utilisateur::create([
            "nom"=>$request->nom,
            "numero"=>$request->numero
        ]);
        $user = Client::create([
            "utilisateur_id"=>$utilisateur->id,
            "ville"=>$request->ville,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
