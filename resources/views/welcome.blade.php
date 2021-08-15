<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
            

            
        </style>
    </head>
    <body class="bg-color">
        <div class="flex-center position-ref full-height">
            <!-- @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif -->

            <div class="content">
                <div class="title m-b-md">
                ရည်းစားယူပီးလှူမှကြိုဆိုပါတယ်
                </div>

                

                <div class="container">
                    <div class="row">
                        <form action="/check-code" method="POST">
                        @csrf
                            <label for="" class="mb-2 d-block">ရှေ့ဆက်ရန် adminများမှ ပေးထားသော codeကို ရိုက်ထည့်ပါ။</label>
                            <input type="text" name='key' class="welcome-input">
                            <button class="btn-purple" type="submit">Submit</button>
                            <p class="text-danger">
                            @php
                                echo session()->has('error') ? session('error'): "";
                                session()->forget('error');
                            @endphp</p>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>
