<div class="form-group ml-1 animate__animated animate__bounce">

    <h4 align="center">Editar Noticia</h4>
    <label for="titulo">Titulo de la noticia</label>
    <input class="form-control mb-3" type="text" name="titulo" wire:model.defer="titulo">
    @error('titulo') <span class="error text-danger">{{ $message }}</span> @enderror
    <br>

    <label for="contenido">Contenido</label>
    <textarea class="form-control mb-3" name="contenido" wire:model.defer="contenido" id="" cols="3" rows="6"></textarea>
    @error('contenido') <span class="error text-danger">{{ $message }}</span> @enderror
    <br>

    <label for="titulo">Categoria</label>
    <select class="form-control" wire:model.defer="categoria" >
        <option value="seleccione">Seleccione</option>
        <option value="educacion">Educación</option>
        <option value="institucional">Institucional</option>
        <option value="educacion">Social</option>
    </select>
    <br>

    <!-- <label for="foto">Elija una imagen:</label>
    <input type="file" name="foto" class="form-control mb-3" wire:model="foto">
    @error('foto') <span class="error">{{ $message }}</span> @enderror -->

    <button class="btn btn-warning" wire:click="actualizarNoticia"> <span class="p-3">Actualizar Noticia</span> </button>
    <button class="btn btn-primary" wire:click="volverCrear"> <span class="p-3">Cancelar</span> </button>


</div>

