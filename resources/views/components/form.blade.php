<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>{{ $title }} - Maratonando</title>
</head>
<body>
    {{-- <nav class="navbar navbar-expand navbar-dark bg-dark" aria-label="Second navbar example">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Always expand</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
    
          <div class="collapse navbar-collapse" id="navbarsExample02">
            <ul class="navbar-nav me-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('series.index') }}">Home</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('series.create') }}">Criar Série</a>
              </li>
            </ul>

            @auth
                <div>
                    <a class="bg-danger p-2 text-light rounded" style="text-decoration: none !important" href="">Logout</a>
                </div>

            @else
                <div>
                    <a href="" class="bg-success p-2 text-light rounded" style="text-decoration: none !important">Entrar</a>
                </div>
            @endauth

          </div>
        </div>
      </nav> --}}
    

    @if ($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger">{{ $error }}</div>
        @endforeach

    @endif

    <div class="container">
        {{ $slot }}
    </div>
    <script src="{{ asset('js/removeFlashMessage.js') }}"></script>
</body>
</html>
