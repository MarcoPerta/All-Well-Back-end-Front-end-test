@extends('layouts.app')

@section('content')
<p>
    Abbiamo ricevuto la tua richiesta di reset password per l'account associato all'email:.
    Se l'email è corretta, clicca il bottone qui sotto per procedere con la reimpostazione della password.
    Se invece hai inserito l'email sbagliata, torna alla pagina precedente e inserisci la corretta.
</p>

<a href="{{ route('password.reset', ['token' => session('reset_password_token')]) }}"  class="btn btn-primary">
    Resetta Password
</a>
@endsection