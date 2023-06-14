@extends('layouts.main')

@section('title', 'Home')

@section('buttons')

<a href="/cadastro" class="btn btn-secondary">Cadastre-se</a>
<a href="/login" class="btn btn-secondary">Login</a>

@endsection

@section('content')



  <div id="summernote"><p>Hello Summernote</p></div>
  <script>
    $(document).ready(function() {
        $('#summernote').summernote();
    });
  </script>


@endsection