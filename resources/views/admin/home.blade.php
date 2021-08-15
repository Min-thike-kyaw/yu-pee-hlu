
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Forms</h1>
@stop

@section('content')
    <div class="container">
        <div class="col-md-8">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Account</th>
                        <th>Email</th>
                        <th>Gender</th>
                        <th>Age</th>
                        <th>Partner Gender</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($forms as $form)
                        <tr>
                            <td>{{$form->acc_name}}</td>
                            
                            <td>{{$form->email}}</td>
                            <td>{{$form->your_gender_text}}</td>
                            <td>{{$form->age}}</td>
                            <td>{{$form->partner_gender}}</td>
                            <td><a class="btn btn-primary" href="admin/forms/{{$form->id}}">See more</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop

