
@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Codes</h1>
@stop

@section('content')
    <div class="container">
        <div class="col-md-8">
            <form action="/admin/codes" class="mb-2" method="POST">
            @csrf
                <button type="submit" class="btn btn-success">Generate a code</button>
            </form>
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Key</th>
                        <th>Verified at</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($codes as $index => $code)
                        <tr>
                            <td>{{++$index}}</td>
                            <td>{{$code->key}}</td>
                            
                            <td>{{$code->verified_at?? 'not yet'}}</td>
                            <td><a href="/admin/codes/{{$code->id}}/delete" class="btn btn-danger" >Delete code</a></td>
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

