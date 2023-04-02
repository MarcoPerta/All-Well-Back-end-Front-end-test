@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto text-center mt-5">
                <h2 class="my-2" style="color: #4EE0BC">This is your beautiful test app!</h2>

                <div style="border: 1px solid grey" class="p-2">
                    <p><strong> This app let's you change the color of the button below from green to red each time you
                     click it! isn't amazing ? </strong></p>
                    <button  id="btn" style="background-color: #4EE0BC; border-radius:10px 10px 10px 10px; ">
                        <strong>Change the color of this button now</strong>
                    </button>
                </div>

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
