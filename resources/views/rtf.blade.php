@extends('layouts.main')

@section('title', 'Home')

@section('buttons')

<a href="/dashboard" class="btn btn-secondary">Voltar</a>

@endsection

@section('content')

{{ $dado->text }}

@endsection