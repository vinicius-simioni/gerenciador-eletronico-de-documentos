@extends('layouts.main')

@section('title', 'Cadastre-se')

@section('buttons')

<a href="/login" class="btn btn-secondary">Login</a>

@endsection

@section('content')

<form method="POST" action="{{ route('cadastro')}}" class="mx-25">
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
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="termos" name="termos">
        <label class="form-check-label" for="termos">Aceito os termos de uso</label>
    </div>
    <button type="submit" class="btn btn-success">Cadastrar</button>
</form>

@endsection