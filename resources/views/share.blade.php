@extends('layouts.main')

@section('title', 'Login')

@section('buttons')

<a href="/dashboard" class="btn btn-secondary">Voltar</a>

@endsection

@section('content')

<form class="form w-75 mx-auto mb-3" method="POST" action="{{ route('share/get_names') }}">
  @csrf
  <div class="d-flex">
    <input type="hidden" name="document_id" value="{{ $document_id }}">
    <input type="text" class="form-control mr-1" name="name" id="name" placeholder="Digite o nome">
    <button type="submit" class="btn btn-primary">Buscar</button>
  </div>
</form>

<div>
@if (isset($dados))
<form method="POST" action="{{ route('share/store') }}">
  @csrf
  <input type="hidden" name="document_id" value="{{ $document_id }}">
  <input type="checkbox" name="read" value="true"> Ler
  <input type="checkbox" name="edit" value="true"> Editar
  <input type="checkbox" name="delete" value="true"> Excluir
  </td>
  <table class="table table-striped table-bordered w-75 mx-auto">
    <thead class="thead-dark">
      <tr>
        <th scope="col">Selecionar</th>
        <th scope="col">Nome</th>
        <th scope="col">Email</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($dados as $usuario)
      <tr>
        <td><input type="checkbox" name="shared_user_id" value="{{ $usuario->id }}"></td>
        <td>{{ $usuario->name }}</td>
        <td>{{ $usuario->email }}</td>
      </tr>
      @endforeach
    </tbody>
  </table>

  <div class="text-right">
    <button type="submit" class="btn btn-primary float-right">Compartilhar</button>
  </div>
</form>
</div>
@endif

@endsection