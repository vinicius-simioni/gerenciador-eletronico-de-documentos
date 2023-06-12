@extends('layouts.main')

@section('title', 'Dasboard')

@section('buttons')

<a href="/upload" class="btn btn-primary">Upload de Arquivo</a>
<a href="/logout" class="btn btn-secondary">Sair</a>

@endsection

@section('content')


<div class="mx-auto w-75">
  <table class="table table-striped-columns">
    <tr>
      <th>Nome</th>
      <th>Adicionado em</th>
      <th>Ações</th>
    </tr>
    @foreach($dados as $dado)
    <tr>
      <td>{{ $dado->arquivo }}</td>
      <td>{{ $dado->updated_at }}</td>
      <td> <a href="{{ route('dashboard/destroy', ['id' => $dado['id'], 'arquivo' => $dado['arquivo']]) }}" class="btn btn-danger">Excluir</a>
        <a href="{{ route('dashboard/file', ['arquivo' => $dado['arquivo']]) }}" class="btn btn-primary">Abrir</a>
        <a href="{{ route('dashboard/file', ['arquivo' => $dado['arquivo']]) }}" class="btn btn-secondary">Compartilhar</a>
      </td>
    </tr>
    @endforeach
  </table>
</div>





@endsection