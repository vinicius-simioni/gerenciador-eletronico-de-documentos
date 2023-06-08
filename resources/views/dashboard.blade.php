@extends('layouts.main')

@section('title', 'Dasboard')

@section('buttons')

<a href="/upload" class="btn btn-primary">Upload de Arquivo</a>
<a href="/logout" class="btn btn-secondary">Sair</a>

@endsection

@section('content')

<main>

<table class="table table-dark table-striped-columns">
<table>
  <tr>
    <th>Nome</th>
    <th>Adicionado em</th>
    <th>Ações</th>
  </tr>
  @foreach($dados as $dado)
  <tr>
    <td>{{ $dado->arquivo }}</td>
    <td>{{ $dado->updated_at }}</td>
    <td></td>
  </tr>
  @endforeach
</table>
</table>


@endsection