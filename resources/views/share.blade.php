@extends('layouts.main')

@section('title', 'Login')

@section('buttons')

<a href="/dashboard" class="btn btn-primary">Voltar</a>

@endsection

@section('content')

<form class="form w-75 mx-auto mb-3" method="POST" action="{{ route('share/get_names') }}">
  @csrf
  @method('post')
  <div class="d-flex mt-3">
    <input type="hidden" name="document_id" value="{{ $document_id }}">
    <input type="text" class="form-control mr-1" name="name" id="name" placeholder="Digite o nome do usuário" value="{{ old('name') }}">
    <button type="submit" class="btn btn-primary ml-1">Buscar</button>
  </div>
</form>

@if (isset($dados))
<form method="POST" action="{{ route('share/store') }}" class="w-75 mx-auto">
  @csrf
  <input type="hidden" name="document_id" value="{{ $document_id }}">

  <div>
    <label class="font-weight-bold">Permissões: </label>
    <input type="checkbox" id="read" name="read" value="true"> <label for="read">Ler</label>
    <input type="checkbox" id="edit" name="edit" value="true"> <label for="edit">Editar</label>
    <input type="checkbox" id="delete" name="delete" value="true"> <label for="delete">Excluir</label>
  </div>


  </td>
  <table class="table table-striped table-bordered mt-3">
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

@endif

@endsection