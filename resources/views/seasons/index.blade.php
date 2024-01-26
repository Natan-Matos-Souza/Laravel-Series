<x-layout title="Página Home">

    <h1>Série: {{ $serie->name }}</h1>
    <a href="{{ route('series.index') }}" class="btn btn-primary mb-2">Menu principal</a>

    <ul class="list-group">
        @foreach($seasons as $season)
            <li class="list-group-item d-flex justify-content-between align-items-center">
                <a href="{{ route('episodes.index', $season->season_id) }}">Temporada: {{ $season->number }}</a>

                <div class="options d-flex flex-row gp-10 align-items-center text-light badge bg-secondary">
                    <span> {{ $season->getWatchedEpisodes() }} / {{ $season->episodes->count() }}</span>
                </div>

            </li>
        @endforeach
    </ul>
</x-layout>
