<x-layout title="Adicionar Série">

    <div class="form-container">
        <form  class="row mb-3" method="POST" action="{{ route('series.store') }}" enctype="multipart/form-data">
          @csrf
            <h2>Adicionar Série</h2>
            <div class="col-8">
              <label for="exampleInputEmail1" class="form-label">Nome da série:</label>
              <input autofocus type="text" name="name" value="{{ old('name') }}" class="form-control">
            </div>

            <div class="col-2">
              <label for="exampleInputEmail1" class="form-label">Temporadas:</label>
              <input type="number" name="seasonsQuantity" value="{{ old('name') }}" class="form-control">
            </div> 

            <div class="col-2">
              <label for="exampleInputEmail1" class="form-label">Ep. por Temporada:</label>
              <input type="number" name="episodesQuantity" value="{{ old('name') }}" class="form-control">
            </div> 
            

            <div class="row mb-3">
              <div class="col-12">
                <label for="file-input" class="form-label">Imagem: </label>
                <input type="file" id="file-input" name="image" class="form-control" accept="image/gif, image/jpeg, image/png">
              </div>
            </div>

            <div>
              <button type="submit" class="btn btn-success">Enviar</button>
            </div>
        </form>
    </div>
</x-layout>