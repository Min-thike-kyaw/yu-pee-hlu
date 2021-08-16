
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
                            
                            <td>
                            


                            <button value="copy" class="btn btn-outline-dark" onclick="copyToClipboard('{{ $code->key }}')"><i class="fas fa-copy"></i></button>
                                <a href="/admin/codes/{{$code->id}}/delete" class="btn btn-danger" >Delete code</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            
        </div>
    </div>
@stop

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />


@stop

@section('js')
    <script> 
    function copyToClipboard(id) {
        navigator.clipboard.writeText(id);
        document.execCommand('copy');
        if(document.execCommand('copy')){

  }

    }
 </script>
@stop

