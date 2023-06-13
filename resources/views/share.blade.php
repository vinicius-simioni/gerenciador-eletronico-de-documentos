@extends('layouts.main')

@section('title', 'Login')

@section('buttons')

<a href="/dashboard" class="btn btn-secondary">Voltar</a>

@endsection

@section('content')

<form class="form w-75 mx-auto" method="POST" action="{{ route('share/get_names') }}">
  @csrf
  <div class="d-flex">
    <input type="text" class="form-control mr-1" name="name" id="name" placeholder="Digite o nome">
    <button type="submit" class="btn btn-primary">Buscar</button>
  </div>
</form>

@endsection