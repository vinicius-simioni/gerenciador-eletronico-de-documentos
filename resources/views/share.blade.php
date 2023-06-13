@extends('layouts.main')

@section('title', 'Login')

@section('buttons')

<a href="/dashboard" class="btn btn-secondary">Voltar</a>

@endsection

@section('content')

<form class="form w-75 mx-auto mb-3" method="POST" action="{{ route('share/get_names') }}">
  @csrf
  <div class="d-flex">
    <input type="text" class="form-control mr-1" name="name" id="name" placeholder="Digite o nome">
    <button type="submit" class="btn btn-primary">Buscar</button>
  </div>
</form>


@if (isset($dados))
<table class="table table-striped table-bordered w-75 mx-auto">
  <thead class="thead-dark">
    <tr>
      <th scope="col">Nome</th>
      <th scope="col">Email</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($dados as $usuario)
    <tr>
      <td>{{ $usuario->name }}</td>
      <td>{{ $usuario->email }}</td>
    </tr>
    @endforeach
  </tbody>
</table>
@endif

@endsection