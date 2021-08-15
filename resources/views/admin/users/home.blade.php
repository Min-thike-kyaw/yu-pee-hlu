
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Admins</h1>
@stop

@section('content')
    <div class="container">
        <div class="col-md-8">
            <div class="d-flex mb-2 justify-content-end"><a href="/users/register" class="btn btn-lg btn-primary">Register</a></div>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
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

