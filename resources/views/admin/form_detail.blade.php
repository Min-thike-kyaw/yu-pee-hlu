
<!-- @extends('adminlte::page')

@section('title', 'Dashboard')


@section('content')
    <div class="container">
        <div class="col-md-8">
           <h2>Name : <a href="{{$form->acc_link}}">{{$form->acc_name}}</a></h2>
           <hr><br>

           <p>City : {{$form->city}}</p>
           <p>Email: {{$form->email}}</p>
            <hr>

           <p>Age : {{$form->age}}</p>
           <p>လိုချင်တဲ့လူရဲ့Age : {{$form->age_you_want}}</p>
           <hr>

           <p>Gender : {{$form->your_gender_text}}</p>
           <p>လိုချင်တဲ့ရည်းချားရဲ့gender  : {{$form->partner_gender}}</p>
           <hr>

           <p>Skin tone : {{$form->your_skin_tone_text}}</p>
           <p>လိုချင်တဲ့ရည်းချားရဲ့skin tone : {{$form->partner_skin_tone}}</p>
           <hr>

           <p>{{$form->acc_name}}'s height : {{$form->feet_inch['feet']}} feet {{$form->feet_inch['inches']}} inches </p>
           <p>Height : {{$form->partner_height}}</p>
           <hr>

           <p>ကိုယ့်ရုပ်ရည်ခန့်မှန်းချက်  : {{$form->your_look}}</p>
           <p>လိုချင်တဲ့ပုံစံ  : {{$form->other_looks_you_want}}</p>
           <hr>

           <p>Body Shape : {{$form->your_body_shape_text}}</p>
           <p>လိုချင်တဲ့လူရဲ့body shape : {{$form->partner_skin_tone}}</p>

            <img src="{{asset('images/'.$form->photo)}}" width="1000" alt="">
    
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop -->

