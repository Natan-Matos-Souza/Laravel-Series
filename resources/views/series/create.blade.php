<x-layout title="Adicionar Série">
    <div class="form-container">
        <form method="POST" action="/series/salvar">
          @csrf
            <h2>Adicionar Série</h2>
            <div class="mb-3"> 
              <label for="exampleInputEmail1" class="form-label">Nome da série:</label>
              <input type="text" name="name" class="form-control">
            </div> 
            <button type="submit" class="btn btn-primary">Enviar</button>
          </form>
    </div>
</x-layout>