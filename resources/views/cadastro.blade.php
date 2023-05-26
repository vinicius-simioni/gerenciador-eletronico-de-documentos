@extends('layouts.main')

@section('title', 'Cadastre-se')

@section('content')

<form>
    <div class="form-group">
        <label for="nome">Nome</label>
        <input type="text" class="form-control" id="nome" placeholder="Digite seu nome" name="nome">
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" placeholder="Digite seu email" name="email">
    </div>
    <div class="form-group">
        <label for="senha">Senha</label>
        <input type="password" class="form-control" id="senha" placeholder="Digite sua senha" name="senha">
    </div>
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="termos" name="termos">
        <label class="form-check-label" for="termos">Aceito os termos de uso</label>
    </div>
    <button type="submit" class="btn btn-success">Cadastrar</button>
</form>

@endsection