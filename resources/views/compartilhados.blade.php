@extends('layouts.main')

@section('title', 'Documentos compartilhados')

@section('buttons')

<a href='/dashboard' class="btn btn-secondary">Meus Arquivos</a>
<a href='/editor' class="btn btn-secondary">Criar</a>
<a href="/logout" class="btn btn-danger">Sair</a>

@endsection

@section('content')

@if($dados->isEmpty())
<div class="mx-auto w-75 mt-3">
  <p class="text-center">Você não possui nenhum documento compartilhado</p>
</div>
@else
<div class="mx-auto w-75 mt-3">

  <form method="post" action="{{ route('filteredSharedWith') }}" class="d-flex justify-content-around mb-3">
    @csrf
    <div class="d-flex justify-content-around align-items-center w-25">
      <label for="name" style="width: 60px;">Nome:</label>
      <input type="text" id="name" name="name" class="form-control">
    </div>
    
    <div class="d-flex justify-content-around align-items-center w-25">
      <label for="start_date text-nowrap" style="width: 300px; margin-left: 5px">Compartilhado com:</label>
      <input type="text" id="user_name" name="user_name" class="form-control">
    </div>

    <div class="d-flex justify-content-around align-items-center w-25">
      <label for="start_date text-nowrap" style="width: 115px; margin-left: 5px">Data inicial:</label>
      <input type="date" id="start_date" name="start_date" class="form-control">
    </div>

    <div class="d-flex justify-content-around align-items-center w-25">
      <label for="end_date" style="width: 100px; margin-left: 5px">Data final:</label>
      <input type="date" id="end_date" name="end_date" class="form-control">
    </div>
    <div class="d-flex align-items-center">
      <button type="submit" class="btn btn-primary" style="margin-left: 5px">Filtrar</button>
    </div>
  </form>

  <form action="{{ route('sharedUpdate') }}" method="POST">
    @csrf

    <table class="table table-striped-columns">
      <tr>
        <th>Nome do documento</th>
        <th>Compartilhado com</th>
        <th>Adicionado em</th>
        <th>Permissões</th>
      </tr>
      @foreach($dados as $dado)
      <tr>
        <td>{{ $dado->doc_name }}</td>
        <td>{{ $dado->user_name }}</td>
        <td>{{ $dado->created_at }}</td>
        <td>
          <input type="checkbox" name="permissions[{{ $dado->id }}][read]" value="1" {{ $dado->read ? 'checked' : '' }}> Ler
          <input type="checkbox" name="permissions[{{ $dado->id }}][edit]" value="1" {{ $dado->edit ? 'checked' : '' }}> Editar
          <input type="checkbox" name="permissions[{{ $dado->id }}][delete]" value="1" {{ $dado->delete ? 'checked' : '' }}> Excluir
          <a href="/share/remove/{{ $dado->id }}" class="btn btn-danger">Remover</a>
        </td>
      </tr>
      @endforeach
    </table>
    <button type="submit" class="btn btn-primary">Atualizar</button>
  </form>
</div>

@endif

@endsection