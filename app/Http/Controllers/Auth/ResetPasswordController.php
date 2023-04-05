<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use App\User;
use Illuminate\Routing\Redirector;

class ResetPasswordController extends Controller
{

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */

 
        public function reset(Request $request)
        {
            // Validazione dei dati inseriti dall'utente
            $request->validate([
                'token' => 'required',
                'email' => 'required|email',
                'password' => 'required|confirmed|min:8',
            ]);
     
            // Reset della password
            $response = $this->broker()->reset(
                $request->only('email', 'password', 'password_confirmation', 'token'),
                function ($user, $password) {
                    $this->resetPassword($user, $password);
                }
            );
     
            // Reindirizzamento a una pagina success in caso di successo
            if ($response == Password::PASSWORD_RESET) {
                return redirect()->route('password.success');
            }
     
            // Reindirizzamento alla pagina di reset password in caso di errore
            return back()->withErrors(['email' => [trans($response)]]);

        }

    protected $redirectTo = '/password/success';
}
