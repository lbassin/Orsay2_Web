<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Http\Requests\LoginRequest;

use App\Utilisateur;
use Hash;
use Redirect;

class LoginController extends Controller
{
    public function login()
    {
        return view('login');
    }

    public function signup()
    {
        return view('signup.signup')->with('etape', 1);
    }

    public function submitLogin(LoginRequest $request){

      $user = Utilisateur::where('email', $request->input('inputEmail'))->first();

      if(count($user) == 1){
        if(Hash::check($request->input('inputPassword'), $user->password)){
          session(['uid' => $user->id]);
          session(['prenom' => $user->prenom]);
          session(['nom' => $user->nom]);
          session(['email' => $user->email]);
          session(['typeUtilisateur' => $user->type]); // Changer le type en fonction de l'Utilisateur (Etudiant, prof, ...)


          return Redirect::route('dashboard');
        }else{
          session()->flush();

          session()->flash('wrongPwd', 'Mot de passe érroné.');
          return redirect()->route('login');
        }
      }

      return "Error.";
    }

    public function submitSignup($etape)
    {
        return 'ok';
    }

}
