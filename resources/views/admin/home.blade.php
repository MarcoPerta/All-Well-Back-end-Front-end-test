@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto text-center mt-5">
                <h2 class="my-2" style="color: #076dbb">This is your beautiful test app!</h2>

                <div style="border: 1px solid grey" class="p-2">
                    <p><strong> This app let's you change the color of the button below from green to red each time you
                     click it! isn't amazing ? </strong></p>
                    <button  id="btn" style="background-color: #4EE0BC; border-radius:10px 10px 10px 10px; ">
                        <strong>Change the color of this button now</strong>
                    </button>
                </div>

                <button type="submit" class="btn mt-4" style="background-color: #4EE0BC; border-radius:10px 10px 10px 10px; width:100px; margin-left: 480px">
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
@endsection

@push('script')
    <script>
        //riga JQuery esegue il codice JavaScript solo dopo che l'intera pagina HTML è stata caricata dal browser
        $(document).ready(function() {
            let button = document.getElementById('btn');
            console.log(button);
            
            button.addEventListener('click', function() {
                //Restituisce il valore della proprietà background-color dell'elemento button
                let buttonColor = window.getComputedStyle(button).getPropertyValue('background-color');

                if (buttonColor === 'rgb(78, 224, 188)') {
                    button.style.backgroundColor = 'red';
                    console.log(button)
                } else {
                    button.style.backgroundColor = '#4EE0BC';
                }
            });
        });
    </script>
@endpush
