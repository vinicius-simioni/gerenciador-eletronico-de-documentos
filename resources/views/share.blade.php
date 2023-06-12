@extends('layouts.main')

@section('title', 'Login')

@section('buttons')

<a href="/dashboard" class="btn btn-secondary">Voltar</a>

@endsection

@section('content')

<form class="form">
  <div class="flex">
    <input type="text" class="form-control" name="name" id="name" placeholder="Digite o nome">
  <button type="submit" class="btn btn-primary">Buscar</button>
  </div>
</form>

@endsection