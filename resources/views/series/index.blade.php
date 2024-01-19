<x-layout title="Página Home">

    @if ($flashMessage)
    <div class="alert alert-success" role="alert">
        {{ $flashMessage }}
    </div>
    @endif
    <h1>Séries:</h1>
    <a href="{{ route('series.create') }}" class="btn btn-dark mb-2">Adicionar</a>

    <ul class="list-group">
        @foreach($series as $serie)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                {{ $serie->name }}

                <div class="options d-flex flex-row gp-10 align-items-center">


                    <a href="{{ route('series.edit', $serie->id) }}">Editar</a>

                    <form class="m-3" action="{{route('series.destroy', $serie->id)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="X" class="btn btn-danger btn-sm w-4 h-4">
                    </form>

                    
                </div>

            </li>
        @endforeach
    </ul>
</x-layout>