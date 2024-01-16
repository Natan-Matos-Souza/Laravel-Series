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

                <form action="{{route('series.destroy', $serie->id)}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" value="X" class="btn btn-danger btn-sm">
                </form>

            </li>
        @endforeach
    </ul>

    <script>
        const flashMessage = document.querySelector('.alert');

        function removeFlashMessage(flashMessage)
        {
            setTimeout(() => {
                flashMessage.style.display = 'none';
            }, 2 * 1000);
        }

        if (flashMessage) removeFlashMessage(flashMessage);

    </script>

</x-layout>