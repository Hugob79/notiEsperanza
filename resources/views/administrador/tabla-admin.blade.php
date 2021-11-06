<div>
<!-- #region Buscador -->
    <div class="form-inline">
            <div class="mb-2">
                <input wire:model.debounce.500ms="filtro" class="form-control input-sm" type="text" placeholder="Buscar...">
        
                <select wire:model.lazy="porPagina" class="form-control">
                    <option value="10">10 por página</option>
                    <option value="30">30 por página</option>
                    <option value="50">50 por página</option>
                    <option value="100">100 por página</option>
                </select>
            </div>
    </div>
<!-- #endregion -->


    <table class="table">
        <thead>
            <th>Título</th>
            <th>Contenido</th>
            <th>Categoría</th>
            <th>Fecha</th>
            <th>Imagen</th>
            <th>Acción</th>
        </thead>
    
        <tbody>
            @foreach ($noticias as $noticia )
                <tr>
                    <td>{{$noticia->titulo}}</td>
                    <td>{{$noticia->contenido}}</td>
                    <td>{{$noticia->categoria}}</td>
                    <td>{{date("d/m/Y", strtotime($noticia->created_at))}}</td>
                    <td><img src="{{$noticia->foto}}" alt="Foto de la noticia" width="150"></td>
                   
                    <td>
                        <button class="btn btn-warning" wire:click="editarNoticia({{$noticia->id}})">Editar</button> <br><br>
                        <button class="btn btn-danger" wire:click="borrarNoticia({{$noticia->id}})">Borrar</button>
                    </td>
                </tr>
            @endforeach
            
            
        </tbody>
    </table>

    {{$noticias->links()}}
</div>