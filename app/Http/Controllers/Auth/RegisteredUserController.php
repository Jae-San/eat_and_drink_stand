<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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
    public function create(): View|RedirectResponse
    {
        if (auth()->check()) {
            $user = auth()->user();
            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'entrepreneur_approuve') {
                return redirect()->route('entrepreneur.dashboard');
            } elseif ($user->role === 'entrepreneur_en_attente') {
                return redirect()->route('attente');
            } elseif ($user->role === 'entrepreneur_rejete') {
                return redirect()->route('rejet');
            }
            return redirect('/');
        }
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'nom_stand' => ['required', 'string', 'max:255'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'entrepreneur_en_attente',
        ]);

        // Création du stand lié à l'utilisateur
        \App\Models\Stand::create([
            'nom_stand' => $request->nom_stand,
            'utilisateur_id' => $user->id,
        ]);

        event(new Registered($user));

        // Toujours déconnecter après inscription, car il faut attendre l'approbation
        Auth::logout();
        return redirect()->route('attente')->with('message', "Votre compte est en attente d'approbation par un administrateur.");
    }
}
