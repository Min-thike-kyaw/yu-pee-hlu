@extends('layouts.form')

@section('body')
<div class="container">
    <form action="/forms" method="POST">
    @csrf
            <div class="form-group form-group-custom">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

                <label for="age">Age</label>
                <input type="number" name="age" class="form-control" required>
            </div>

            <div class="form-group form-group-custom">
                <label for="city">City</label>
                <input type="text" name="city" class="form-control" required>
            </div>
            
            <div class="form-group form-group-custom">
                <label for="acc_name">Acc Name</label>
                <input type="text" name="acc_name" class="form-control" required>
            </div>

            <div class="form-group form-group-custom">
                <label for="gender">Gender</label>
                @foreach(config('form')['gender'] as $index => $gender)
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="{{$index}}" name="gender" id="gender" required>
                    <label class="form-check-label" for="gender">
                        {{$gender}}
                    </label>
                </div>
                @endforeach
            </div>

            <div class="form-group form-group-custom">
            <label for="gender_you_want">လိုချင်တဲ့ရည်းချားရဲ့gender</label>
                @foreach(config('form')['gender_you_want'] as $index => $gender_you_want)
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="{{$index}}" name="gender_you_want" id="gender" required>
                    <label class="form-check-label" for="gender">
                        {{$gender_you_want}}
                    </label>
                </div>
                @endforeach
            </div>

            <div class="form-group form-group-custom">
                <label for="look_you_want">လိုချင်တဲ့ပုံစံကိုရေးပေးပါ *</label>
                <input type="text" name="look_you_want" class="form-control" required>
            </div>

            <div class="form-group form-group-custom">
                <label for="email">Email *</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="form-group form-group-custom">
            <label for="gender_you_want">Skin tone *</label>
                @foreach(config('form')['skin_tone_you_want'] as $index => $skin_tone_you_want)
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="{{$index}}" name="skin_tone_you_want" id="gender" required>
                    <label class="form-check-label" for="gender">
                        {{$skin_tone_you_want}}
                    </label>
                </div>
                @endforeach
            </div>

            <div class="form-group form-group-custom">
            <label for="gender_you_want">Height</label>
                @foreach(config('form')['height_you_want'] as $index => $height_you_want)
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="{{$index}}" name="height_you_want" id="gender" required>
                    <label class="form-check-label" for="gender">
                        {{$height_you_want}}
                    </label>
                </div>
                @endforeach
            </div>

            <div class="form-group form-group-custom">
            <label>Height</label>
                <div class="row">
                    <div class="col">
                        <select name="feet" class="form-control" required>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                        </select> 
                        feet
                    </div>
                    <div class="col">
                        <select name="inches" class="form-control" required>
                            <option value="0">0</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="4">3</option>
                            <option value="5">4</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                            </select>
                            inch(es)
                    </div>
                </div>
                
                
            </div>

            <div class="form-group form-group-custom">
            <label for="gender_you_want">Body Shape</label>
                @foreach(config('form')['your_body_shape'] as $index => $your_body_shape)
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="{{$index}}" name="your_body_shape" id="gender" required>
                    <label class="form-check-label" for="gender">
                        {{$your_body_shape}}
                    </label>
                </div>
                @endforeach
            </div>

            <div class="form-group form-group-custom">
            <label for="gender_you_want">လိုချင်တဲ့လူရဲ့body shape *</label>
                @foreach(config('form')['body_shape_you_want'] as $index => $body_shape_you_want)
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="{{$index}}" name="body_shape_you_want" id="gender" required>
                    <label class="form-check-label" for="gender">
                        {{$body_shape_you_want}}
                    </label>
                </div>
                @endforeach
            </div>

            <div class="form-group form-group-custom">
            <label for="gender_you_want">ကိုယ့်ရုပ်ရည်ခန့်မှန်းချက် *</label>
                @foreach(config('form')['your_look'] as $index => $your_look)
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="{{$index}}" name="your_look" id="gender" required>
                    <label class="form-check-label" for="gender">
                        {{$your_look}}
                    </label>
                </div>
                @endforeach
            </div>
            <div class="form-group form-group-custom">
            <label for="age_you_want">လိုချင်တဲ့လူရဲ့Age</label>
               <input type="text" name="age_you_want" class="form-control" required> 
            </div>
            <!-- <button type="button" class="btn btn-primary">Primary</button> -->
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
   </div>
@endsection