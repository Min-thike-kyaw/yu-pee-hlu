
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Dashboard</h1>
@stop

@section('content')
    <div class="container">
        <div class="col-md-8">
            <table class="table">
                <thead>

                </thead>
                <tbody>
                    @foreach ($forms as $form)
                        <tr>
                            <td>{{$form->acc_name}}</td>
                            <td>{{$form->email}}</td>
                            <td>{{$form->gender}}</td>
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

