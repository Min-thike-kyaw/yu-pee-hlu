@extends('layouts.form')

@section('body')
    <div class="form-group-custom">
        <h3>Form Submitted</h3>
        <p>သင်၏ formအား adminများထံသို့ ပေးပို့ပြီးပါပြီ။ ပြန်လည်ပြင်ဆင်လိုပါက editကို နှိပ်၍ပြင်ဆင်နိုင်ပါသည်။</p>
        <button class="btn btn-light">Back to Home</button>
        <a class="btn btn-success" href="/forms/{{$code}}/edit">Edit</a>
    </div>
@endsection