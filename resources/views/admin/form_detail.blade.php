
@extends('adminlte::page')

@section('title', 'Dashboard')


@section('content')
    <div class="container">
        <div class="col-md-8">
           <h2>Name : {{$form->acc_name}}</h2>
           <p>Age : {{$form->age}}</p>
           <p>City : {{$form->city}}</p>
           <p>Gender : {{$form->your_gender_text}}</p>
           <p>Email : {{$form->email}}</p>
           <p>Skin tone : </p>
           <p>{{$form->acc_name}}'s height : {{$form->feet_inch['feet']}} feet {{$form->feet_inch['inches']}} inches </p>
           <p>ကိုယ့်ရုပ်ရည်ခန့်မှန်းချက်  : {{$form->your_look_text}}</p>
           <p>Body Shape : {{$form->your_body_shape_text}}</p>
           <p>လိုချင်တဲ့ရည်းချားရဲ့gender  : {{$form->partner_gender}}</p>
           <p>လိုချင်တဲ့ပုံစံ  : {{$form->look_you_want}}</p>
           <p>Height : {{$form->partner_height}}</p>
           <p>လိုချင်တဲ့လူရဲ့body shape : {{$form->partner_skin_tone}}</p>
           <p>လိုချင်တဲ့လူရဲ့Age : {{$form->age_you_want}}</p>

            
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

