@extends('layouts.main')

@section('title', 'Enviar arquivo')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3 mt-3">
    <h3>Deseja excluir esse arquivo?</h3>
    <form action="{{ route('dashboard/finalDestroy') }}" method="POST">
        @csrf
        @method('delete')
        <input type="hidden" name="id" value="{{ $id }}">
        <button type="submit" class="btn btn-danger mt-3">Excluir arquivo</button>
        <a href="/dashboard" type="button" class="btn btn-primary mt-3">Voltar</a>
    </form>

</div>


@endsection