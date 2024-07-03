<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //function qui affiche le formulaire d'inscription
    public function showregister()
    {
        return view('auth.register');
    }

    //fonction permettant de creer un user
    public function registeruser(Request $request)
    {
        $credentials = $request->validate([
            'nom' => 'string|required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
            'password_confirmation' => 'required|min:6'
        ]);

        User::Create([
            'name' => $request->input('nom'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
    }

    //function qui affiche le formulaire de connexion
    public function showlogin()
    {
        return view('auth.login');
    }

    //function permet de traiter la connexion
    public function loginuser(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|min:3',
            'password' => 'required|min:6'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended()->with('Authentification reussie');
        } else {
            return back()->withErrors('email', ('Informations de connexion incorectes'));
        }
    }

    //fonction permettant la déconnexion
    public function logout(Request $request)
    {
        Auth::logout(); //déconnexion de l'utilisateur courant
        $request->session()->invalidate(); //Invalide les données de la session
        $request->session()->regenerateToken(); //Regénération du jeton CSRFutilisé pour protéger l'app contre les attaques de type CSRF

        return view('auth.login');
    }
}
