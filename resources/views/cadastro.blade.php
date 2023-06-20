@extends('layouts.main')

@section('title', 'Cadastre-se')

@section('buttons')

<a href="/login" class="btn btn-secondary">Login</a>

@endsection

@section('content')

<form method="POST" action="{{ route('cadastro')}}" class="mx-auto w-25 mt-3">
    @csrf
    <div class="form-group">
        <label for="name">Nome</label>
        <input type="text" class="form-control" id="name" placeholder="Digite seu nome" name="name">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" placeholder="Digite seu email" name="email">
    </div>
    <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" class="form-control" id="password" placeholder="Digite sua senha" name="password">
    </div>
    <button type="submit" class="btn btn-success mt-1">Cadastrar</button>
</form>

@endsection