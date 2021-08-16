@extends('layouts.form')

@section('body')
<div class="container">
    <form action="/forms/{{$form->code}}" method="POST">
    @method('PUT')
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
                <input type="number" value="{{$form->age}}" name="age" class="form-control" required>
            </div>

            <div class="form-group form-group-custom">
            <label for="age_you_want">လိုချင်တဲ့လူရဲ့Age</label>
               <input type="text" name="age_you_want" class="form-control" required value="{{$form->age_you_want}}"> 
            </div>

            <div class="form-group form-group-custom">
                <label for="city">City</label>
                <input type="text" name="city" class="form-control" required value="{{$form->city}}">
            </div>
            
            <div class="form-group form-group-custom">
                <label for="acc_name">Fb Acc Name</label>
                <input type="text" name="acc_name" class="form-control" value="{{$form->acc_name}}" required>
            </div>
            <div class="form-group form-group-custom">
                <label for="acc_link">Acc Link</label>
                <input type="text" name="acc_link" class="form-control" value="{{$form->acc_link}}" required>
            </div>

            <div class="form-group form-group-custom">
                <label for="email">Email </label>
                <input type="email" name="email" class="form-control" required value="{{$form->email}}">
            </div>

            <div class="form-group form-group-custom">
                <label for="gender">Gender</label>
                @foreach(config('form')['gender'] as $index => $gender)
                <div class="form-check">f
                    <input class="form-check-input" type="radio" value="{{$index}}" name="gender" id="gender" required <?php echo $index == $form->gender? "checked": ""?> >
                    <label class="form-check-label" for="gender">
                        {{$gender}}
                    </label>
                </div>
                @endforeach
            </div>

            <div class="form-group form-group-custom">
            <label for="gender_you_want">လိုချင်တဲ့ရည်းချားရဲ့gender </label>
                @foreach(config('form')['gender_you_want'] as $index => $gender_you_want)
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="{{$index}}" name="gender_you_want" id="gender" required <?php echo $index == $form->gender_you_want? "checked": ""?>>
                    <label class="form-check-label" for="gender">
                        {{$gender_you_want}}
                    </label>
                </div>
                @endforeach
            </div>

            <div class="form-group form-group-custom">
                <label for="your_look">တခြား ကိုယ့်ရဲ့ ပုံစံလေးရေးပေးပါ </label>
                <input type="text" name="your_look" class="form-control" value="{{$form->your_look}}" required placeholder="အရမ်းဟော့ ၊ ဆက်ဆီကျ ဘာညာပေါ့ ...">
            </div>

            <div class="form-group form-group-custom">
                <label for="other_looks_you_want">လိုချင်တဲ့ပုံစံကိုရေးပေးပါ </label>
                <input type="text" name="look_you_want" class="form-control" required value="{{$form->other_looks_you_want}}">
            </div>
            

            

            <div class="form-group form-group-custom">
            <label for="gender_you_want">Skin tone </label>
                @foreach(config('form')['your_skin_tone'] as $index => $your_skin_tone)
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="{{$index}}" name="your_skin_tone" id="gender" required <?php echo $index == $form->your_skin_tone? "checked": ""?>>
                    <label class="form-check-label" for="gender">
                        {{$your_skin_tone}}
                    </label>
                </div>
                @endforeach
            </div>
            <div class="form-group form-group-custom">
            <label for="gender_you_want">လိုချင်တဲ့ရည်းချားရဲ့ Skin tone </label>
                @foreach(config('form')['skin_tone_you_want'] as $index => $skin_tone_you_want)
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="{{$index}}" name="skin_tone_you_want" id="gender" required <?php echo $index == $form->skin_tone_you_want? "checked": ""?>>
                    <label class="form-check-label" for="gender">
                        {{$skin_tone_you_want}}
                    </label>
                </div>
                @endforeach
            </div>

            <div class="form-group form-group-custom">
            <label>ကိုယ့်ရဲ့ အရပ်အမောင်းလေး ရွေးပေးပါ</label>
                <div class="row">
                    <div class="col">
                        <select name="feet" class="form-control" required>
                            
                            @foreach ([4,5,6,7] as $value)
                                <option value="{{$value}}" <?php echo $value == $form->feet_inch['feet']? "selected": ""?>>{{$value}}</option>
                            @endforeach
                        </select> 
                        feet
                    </div>
                    <div class="col">
                        <select name="inches" class="form-control" required>
                                @foreach ([0,1,2,3,4,5,6,7,8,10,11] as $value)
                                    <option value="{{$value}}" <?php echo $value == $form->feet_inch['inches']? "selected": ""?>>{{$value}}</option>
                                @endforeach
                            
                            
                            </select>
                            inch(es)
                    </div>
                </div>
                
                
            </div>

            <div class="form-group form-group-custom">
            <label for="gender_you_want">Height</label>
                @foreach(config('form')['height_you_want'] as $index => $height_you_want)
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="{{$index}}" name="height_you_want" id="gender" required <?php echo $index == $form->height_you_want? "checked": ""?>>
                    <label class="form-check-label" for="gender">
                        {{$height_you_want}}
                    </label>
                </div>
                @endforeach
            </div>

            

            <div class="form-group form-group-custom">
            <label for="gender_you_want">Body Shape</label>
                @foreach(config('form')['your_body_shape'] as $index => $your_body_shape)
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="{{$index}}" name="your_body_shape" id="gender" required <?php echo $index == $form->your_body_shape? "checked": ""?>>
                    <label class="form-check-label" for="gender">
                        {{$your_body_shape}}
                    </label>
                </div>
                @endforeach
            </div>

            <div class="form-group form-group-custom">
            <label for="gender_you_want">လိုချင်တဲ့လူရဲ့body shape </label>
                @foreach(config('form')['body_shape_you_want'] as $index => $body_shape_you_want)
                <div class="form-check">
                    <input class="form-check-input" type="radio" value="{{$index}}" name="body_shape_you_want" id="gender" required <?php echo $index == $form->body_shape_you_want? "checked": ""?>>
                    <label class="form-check-label" for="gender">
                        {{$body_shape_you_want}}
                    </label>
                </div>
                @endforeach
            </div>

            
            <!-- <button type="button" class="btn btn-primary">Primary</button> -->
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
   </div>
@endsection