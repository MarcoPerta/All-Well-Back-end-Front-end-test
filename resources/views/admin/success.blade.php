@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center d-flex">
        
        <div class="col-6">
            <img src="{{ asset('../../img/Type=Pagamenti.svg') }}" alt="logo" style="margin-right: 150px; width: 400px">
        </div>

        <div class="col-6-md-8 d-flex">

            <div class="card align-self-center">

                <div class="card-body">

                    {{ __('You are logged in!') }}
                    <br>

        
                    <button type="submit" class="btn mt-2" style="background-color: #4EE0BC; border-radius:10px 10px 10px 10px; width:100px">
                        <a style="color: black;" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                            <strong>Go to login</strong> 
                        </a>
                        
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                     </button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection