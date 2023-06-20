@extends('layouts.main')

@section('title', 'Dasboard')

@section('buttons')

<a href='/dashboard' class="btn btn-success">Meus Arquivos</a>
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
    @dump($dado)
    <tr>
      <td>{{ $dado->name }}</td>
      <td>{{ $dado->updated_at }}</td>
      <td class="text-center"> 
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