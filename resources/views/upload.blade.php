@extends('layouts.main')

@section('title', 'Enviar arquivo')

@section('content')

<div id="event-create-container" class="col-md-6 offset-md-3 mt-3">
    <h3>Enviar um arquivo</h3>
    @if(session('msg'))
    <p class="alert alert-success"> {{ session('msg') }}</p>
    @endif
    <form action="/upload" method="POST" enctype="multipart/form-data">
        @csrf
        <!-- imagem -->
        <div class="form-group">
            <label for="arquivo">Escolha um arquivo em formato .pdf, .doc ou .docx</label>
            <div class="mt-3">
                <input type="file" class="form-control-file" id="name" name="name" required>
            </div>
        </div>
        <input type="submit" class="btn btn-primary mt-3" value="Enviar arquivo">
    </form>

</div>


@endsection