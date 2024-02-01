{{-- <x-layout title="Editar">
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
 --}}

<x-layout title="Editar">
  <form  class="row mb-3" method="POST" action="{{ route('series.update', $serie->id) }}" enctype="multipart/form-data">
    @csrf
    @method('PUT')
      <h2>Adicionar Série</h2>
      <div class="col-8">
        <label for="exampleInputEmail1" class="form-label">Nome da série:</label>
        <input autofocus type="text" name="name" value="{{ $serie->name }}" class="form-control">
      </div>
  
      <div class="col-2">
        <label for="exampleInputEmail1" class="form-label">Temporadas:</label>
        <input type="number" name="seasonsQuantity" value="{{ $serie->seasons->count() }}" class="form-control">
      </div> 
  
      <div class="col-2">
        <label for="exampleInputEmail1" class="form-label">Ep. por Temporada:</label>
        <input type="number" name="episodesQuantity" value="{{ $serie->seasons[0]->episodes->count() }}" class="form-control">
      </div> 
      
  
      <div class="row mb-3 mt-3">
        <div class="col-12">
          <label for="file-input" class="form-label">Imagem (Opcional): </label>
          <input type="file" id="file-input" name="image" class="form-control" accept="image/gif, image/jpeg, image/png">
        </div>
      </div>
  
      <div>
        <button type="submit" class="btn btn-success">Enviar</button>
      </div>
  </form>
</x-layout>