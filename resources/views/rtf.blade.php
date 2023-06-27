@extends('layouts.main')

@section('title', 'Visualização de texto')

@section('buttons')

<a href="/dashboard" class="btn btn-primary">Voltar</a>

@endsection

@section('content')

<div class="mt-3 w-75 mx-auto">
{!! $text !!}
</div>


@endsection