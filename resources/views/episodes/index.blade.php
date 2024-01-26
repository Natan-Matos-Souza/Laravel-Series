<x-layout title="Episódios">

    <a href="{{ route('series.index') }}" class="btn btn-primary mb-2">Menu principal</a>

    <ul class="list-group">
        <form method="POST" action>
            @csrf
            @foreach($episodes as $episode)
                <li class="list-group-item d-flex justify-content-between align-items-center">
                    Episódio: {{ $episode->episode_number }}

                    <div>
                        <div class="checkbox-area">
                            <label for="watched-checkbox" class="mb-3">Assitido:</label>
                            <input type="checkbox"
                                   class="mb-3"
                                   name="episodes[]"
                                   value="{{ $episode->episode_id }}"
                                   @if ($episode->watched)
                                       checked
                                   @endif
                            >
                        </div>
                    </div>

                </li>
            @endforeach
            <input class="btn btn-primary" type="submit" value="Salvar">
        </form>
    </ul>
</x-layout>
