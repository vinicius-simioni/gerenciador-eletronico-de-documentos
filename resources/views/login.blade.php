@extends('layouts.main')

@section('title', 'Login')

@section('buttons')

<a href="/cadastro" class="btn btn-secondary">Cadastre-se</a>

@endsection

@section('content')

<form method="POST" action="{{ route('login')}}" class="mx-25">
    @csrf
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" placeholder="Digite seu email" name="email">
    </div>
    <div class="form-group">
        <label for="password">Senha</label>
        <input type="password" class="form-control" id="password" placeholder="Digite sua senha" name="password">
    </div>
    <button type="submit" class="btn btn-success mt-1">Login</button>
</form>

@endsection