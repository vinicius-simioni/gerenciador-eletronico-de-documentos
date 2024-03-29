@extends('layouts.main')

@section('title', 'Editor de texto')

@section('buttons')

<a href="/upload" class="btn btn-secondary">Upload de Arquivo</a>
<a href="/dashboard" class="btn btn-primary">Voltar</a>

@endsection

@section('content')

<!-- Summernote text editor -->
<!-- include libraries(jQuery, bootstrap) -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>

<form method="POST" action="{{ route('upload') }}">
  @csrf

  @if(isset($document->id))
    <input type="hidden" name="id" id="id" value="{{ $document->id }}">
  @endif

  @if(isset($document->name))
  <input type="text" name="name" id="name" value="{{ $document->name }}" class="mb-3 form-control" placeholder="Título">
  @else
  <input type="text" name="name" id="name" class="mb-3 form-control" placeholder="Título">
  @endif

  <textarea id="summernote" name="text">

  @if(isset($document->text))
    {!! $document->text !!}
  @endif

  </textarea>
  <script>
    $(document).ready(function() {
      $('#summernote').summernote(
        {
          height:600,
        }
      );
    });
  </script>
  <button type="submit" class="btn btn-primary">salvar</button>
</form>

@endsection