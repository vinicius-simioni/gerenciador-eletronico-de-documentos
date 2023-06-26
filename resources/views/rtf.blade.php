@extends('layouts.main')

@section('title', 'Home')

@section('buttons')

<a href="/dashboard" class="btn btn-primary">Voltar</a>

@endsection

@section('content')

<div class="mt-3">
{!! $text !!}
</div>


@endsection