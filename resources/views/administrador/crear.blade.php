<div class="form-group ml-1">

    <h4 align="center">Crear Noticia</h4>
    <label for="titulo">Titulo de la noticia</label>
    <input class="form-control mb-3" type="text" name="titulo" wire:model.defer="titulo">

    <label for="contenido">Contenido</label>
    <textarea class="form-control mb-3" name="contenido" wire:model.defer="contenido" id="" cols="3" rows="6"></textarea>
    
    <label for="titulo">Categoria</label>
    <select class="form-control" wire:model.defer="categoria" >
        <option value="seleccione">Seleccione</option>
        <option value="educacion">Educación</option>
        <option value="institucional">Institucional</option>
        <option value="educacion">Social</option>
    </select>
    <br>

    <label for="foto">Elija una imagen:</label>
    <input type="file" name="foto" class="form-control mb-3" wire:model="foto">
    @error('photo') <span class="error">{{ $message }}</span> @enderror

    <button class="form-control btn btn-info" wire:click="crearNoticia"> <span class="p-3">Crear Noticia</span> </button>


</div>

