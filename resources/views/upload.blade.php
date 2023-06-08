@extends('layouts.main')

@section('title', 'Enviar arquivo')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3">
    <h1>Enviar um arquivo</h1>
    @if(session('msg'))
    <p class="alert alert-success"> {{ session('msg') }}</p>
    @endif
    <form action="/upload" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- imagem -->
        <div class="form-group">
            <label for="arquivo" >Arquivo</label>
            <div>
                <input type="file" class="form-control-file" id="arquivo" name="arquivo" placeholder="Insira aqui seu arquivo" required>
            </div>
        </div>
        <input type="submit" class="btn btn-secondary" value="Enviar arquivo">
    </form>

</div>


@endsection