<x-layout title="Editar">
    <div class="form-container">
        <form method="POST" action="{{ route('series.update', $serie->id) }}">
          @csrf
          @method('PUT')
            <h2>Alterar nome</h2>
            <div class="mb-3"> 
              <label for="name-input" class="form-label">Nome da série:</label>
              <input type="text"  value="{{ $serie->name }}" id="name-input" name="name" class="form-control">
            </div> 
            <button type="submit" class="btn btn-primary">Enviar</button>
          </form>
    </div>
</x-layout>