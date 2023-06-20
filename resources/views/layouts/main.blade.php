<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <script src="/js/script.js"></script>

    <link rel="stylesheet" href="/css/style.css">
    <!-- Bootstrap -->

    <meta name="csrf-token" content="{{ csrf_token() }}" />

</head>



<header class="bg-secondary">
    <nav class="navbar mx-4">
        <h2 class="text-dark">Gerenciador de Documentos</h2>
        <div>
            @yield('buttons')
        </div>
    </nav>
</header>

<body class="bg-light">
    <div class="container-fluid">
        <div class="row">
            @if($errors->any())
            <ul class="text-center mt-3" id="errors-list">
                @foreach ($errors->all() as $error)
                <li class="list-unstyled alert alert-danger w-25 mx-auto error-message">{{ $error }}</li>
                @endforeach
            </ul>
            @endif
            <script>
                function removeError() {
                    var errorMessage = document.getElementById('errors-list');
                    errorMessage.style.display = 'none';
                }
                setTimeout(removeError, 2000);
            </script>
            @yield('content')
        </div>

</body>

</html>