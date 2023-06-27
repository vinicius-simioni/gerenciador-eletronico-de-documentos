@extends('layouts.main')

@section('title', 'Dasboard')

@section('buttons')

<a href='/dashboard' class="btn btn-secondary">Meus Arquivos</a>
<a href='/editor' class="btn btn-secondary">Criar</a>
<a href="/logout" class="btn btn-danger">Sair</a>

@endsection

@section('content')

<div class="mx-auto w-75 mt-3">

  <form method="post" action="{{ route('filteredSharedIndex') }}" class="d-flex justify-content-around mb-3">
    @csrf
    <div class="d-flex justify-content-around align-items-center w-25">
      <label for="name">Nome:</label>
      <input type="text" id="name" name="name" class="form-control">
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
      <td class="d-flex justify-content-center">

        <form action="{{ route('share/read') }}" method="POST">
          @csrf
          @method('post')
          <input type="hidden" name="id" value="{{ $dado->id_share }}">
          <button type="submit" class="btn btn-success">Ler</button>
        </form>

        <div style="width: 5px;"></div>

        <form action="{{ route('share/edit') }}" method="POST">
          @csrf
          @method('post')
          <input type="hidden" name="id" value="{{ $dado->id_share }}">
          <button type="submit" class="btn btn-primary">Editar</button>
        </form>

        <div style="width: 5px;"></div>

        <form action="{{ route('share/delete') }}" method="POST">
          @csrf
          @method('delete')
          <input type="hidden" name="id" value="{{ $dado->id_share }}">
          <button type="submit" class="btn btn-danger">Excluir</button>
        </form>

      </td>
    </tr>
    @endforeach
  </table>
</div>

@endsection