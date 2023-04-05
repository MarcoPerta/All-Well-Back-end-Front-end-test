<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use App\User;
use Illuminate\Routing\Redirector;

class ForgotPasswordController extends Controller
{

    public function sendResetLinkEmail(Request $request)
    {
        $this->validateEmail($request);
    
        //query per cercare l'utente con l'indirizzo email inserito dall'utente
        $user = User::where('email', $request->email)->first();
    
        //se l'utente non viene trovato
        if (!$user) {
            return back()->withErrors(['email' => __('Non esiste un utente con questo indirizzo email.')]);
        }

        //creaizone token
        $token = app('auth.password.broker')->createToken($user, 'custom_reset_password_route_name');
       
        //salvataggio variabili
        session(['reset_password_email' => $user->email, 'reset_password_token' => $token]); 
        return redirect()->route('password.checkEmail');
        
    }
 
    use SendsPasswordResetEmails;
}
