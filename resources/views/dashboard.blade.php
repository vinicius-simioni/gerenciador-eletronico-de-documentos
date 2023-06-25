@extends('layouts.main')

@section('title', 'Dasboard')

@section('buttons')

<a href='/dashboard/sharedWith' class="btn btn-success">Documentos Compartilhados</a>
<a href='/dashboard/shared' class="btn btn-success">Compartilhado Comigo</a>
<a href='/editor' class="btn btn-success">Criar</a>
<a href="/logout" class="btn btn-secondary">Sair</a>

@endsection

@section('content')


<div class="mx-auto w-75 mt-3">
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
        <a href="{{ route('dashboard/destroy', ['id' => $dado['id'], 'name' => $dado['name']]) }}" class="btn btn-danger" >Excluir</a>

        <a href="{{ route('dashboard/file', ['id' => $dado['id'], 'name' => $dado['name']]) }}" class="btn btn-success">Abrir</a>

        <a href="{{ route('edit', ['id' => $dado['id']]) }}" class="btn btn-primary">Editar</a>

        <a href="{{ route('share', ['id' => $dado['id']]) }}" class="btn btn-secondary">Compartilhar</a>
      </td>
    </tr>
    @endforeach
  </table>
</div>





@endsection