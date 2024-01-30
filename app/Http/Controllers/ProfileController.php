<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Utilisateur;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
       // dd($request->user());
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        //$a=[1,2,5,47,85,4];
        
        $request->user()->fill($request->validated());
        //dd($request->user());
        /*if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }*/

        $request->user()->save();
        
        //$request->sync('utilisateur_id',$request->user()->utilisateur->id);
       $utili= $request->user()->utilisateur;
       //dd($request->nom);
       /*$utili->save([
        "nom"=>$request->nom,
        "numero"=>$request->numero
       ]);*/
       //$utili->sync([$request->nom,$request->numero]);
       //dd($utili);
       $utili->update([
        "nom"=>$request->nom,
        "numero"=>$request->numero
       ]);

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
