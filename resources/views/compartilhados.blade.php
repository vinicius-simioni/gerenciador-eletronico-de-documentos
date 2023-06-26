@extends('layouts.main')

@section('title', 'Dasboard')

@section('buttons')

<a href='/dashboard' class="btn btn-success">Meus Arquivos</a>
<a href='/editor' class="btn btn-success">Criar</a>
<a href="/logout" class="btn btn-secondary">Sair</a>

@endsection

@section('content')
<div class="mx-auto w-75 mt-3">

  <form method="post" action="{{ route('filteredSharedWith') }}" class="d-flex justify-content-around mb-3">
    @csrf
    <div class="d-flex justify-content-around align-items-center w-25">
      <label for="name">Nome:</label>
      <input type="text" id="name" name="name" class="form-control">
    </div>
    
    <div class="d-flex justify-content-around align-items-center w-25">
      <label for="start_date text-nowrap">Compartilhado com:</label>
      <input type="text" id="user_name" name="user_name" class="form-control">
    </div>

    <div class="d-flex justify-content-around align-items-center w-25">
      <label for="start_date text-nowrap">Data inicial:</label>
      <input type="date" id="start_date" name="start_date" class="form-control">
    </div>

    <div class="d-flex justify-content-around align-items-center w-25">
      <label for="end_date">Data final:</label>
      <input type="date" id="end_date" name="end_date" class="form-control">
    </div>
    <div class="d-flex align-items-center">
      <button type="submit" class="btn btn-primary">Filtrar</button>
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

        </td>
      </tr>
      @endforeach
    </table>
    <button type="submit" class="btn btn-primary">Atualizar</button>
  </form>
</div>





@endsection