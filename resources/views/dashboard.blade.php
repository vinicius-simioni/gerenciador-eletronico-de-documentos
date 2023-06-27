@extends('layouts.main')

@section('title', 'Dashboard')

@section('buttons')

<a href='/dashboard/sharedWith' class="btn btn-secondary">Documentos Compartilhados</a>
<a href='/dashboard/shared' class="btn btn-secondary">Compartilhado Comigo</a>
<a href='/editor' class="btn btn-secondary">Criar</a>
<a href="/logout" class="btn btn-danger">Sair</a>

@endsection

@section('content')

@if($dados->isEmpty())
<div class="mx-auto w-75 mt-3">
  <p class="text-center">Você não possui nenhum documento</p>
</div>
@else

<div class="mx-auto w-75 mt-3">

  <form method="post" action="{{ route('filteredIndex') }}" class="d-flex justify-content-center mb-3">
    @csrf
    <div class="d-flex justify-content-around align-items-center w-25">
      <label for="name" style="width: 60px;">Nome:</label>
      <input type="text" id="name" name="name" class="form-control">
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



  <table class="table table-striped-columns">
    <tr>
      <th>Nome</th>
      <th>Adicionado em</th>
      <th>Ações</th>
    </tr>
    @foreach($dados as $dado)
    <tr>
      <td>{{ $dado->name }}</td>
      <td>{{ $dado->updated_at }}</td>
      <td class="text-center">


        <a href="{{ route('dashboard/file', ['id' => $dado['id'], 'name' => $dado['name']]) }}" class="btn btn-success">Abrir</a>

        <a href="{{ route('edit', ['id' => $dado['id']]) }}" class="btn btn-primary">Editar</a>

        <a href="{{ route('share', ['id' => $dado['id']]) }}" class="btn btn-secondary">Compartilhar</a>

        <a href="{{ route('dashboard/destroy', ['id' => $dado['id'], 'name' => $dado['name']]) }}" class="btn btn-danger">Excluir</a>
      </td>
    </tr>
    @endforeach
  </table>
</div>

@endif
@endsection