<x-layout title="Página Home">

    @if ($flashMessage)
        <div class="alert alert-success" role="alert">
            {{ $flashMessage }}
        </div>
    @endif

    <h1>Séries:</h1>
        @auth
        <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Adicionar</a>
        @endauth

    <ul class="list-group">
        @foreach($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                @if ($serie->coverPath)
                    <img src="{{ asset("/storage/{$serie->coverPath}") }}" style="height: 80px; width: 80px" alt="">
                @else
                    <img src="https://img.freepik.com/premium-photo/popcorn-minimalist-simple_948103-869.jpg" style="height: 80px; width: 80px" alt="">
                @endif

                {{ $serie->name }}

                <div class="options d-flex flex-row gp-10 align-items-center">

                    @auth
                    <a class="m-3" href="{{ route('series.edit', $serie->id) }}">Editar</a>

                    <a class="mg-3"  href="{{ route('seasons.index', $serie->id) }}">Temporadas</a>

                    <form class="m-3" action="{{route('series.destroy', $serie->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="X" class="btn btn-danger btn-sm w-4 h-4">
                    </form>
                    @endauth

                </div>

            </li>
        @endforeach
    </ul>
</x-layout>
