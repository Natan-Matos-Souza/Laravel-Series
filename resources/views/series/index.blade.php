<x-layout title="Página Home">

    <h1>Séries:</h1>
    <a href="/series/adicionar" class="btn btn-dark mb-2">Adicionar</a>

    <ul class="list-group">
        @foreach($series as $serie)
            <li class="list-group-item" >{{ $serie->name }}</li>
        @endforeach
    </ul>

</x-layout>