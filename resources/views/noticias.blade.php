<div>
<!-- #region Buscador -->
<div class="form-inline">
            <div class="mb-2">
                <input wire:model.debounce.500ms="filtro" class="form-control input-sm" type="text" placeholder="Buscar...">
        
                <select wire:model="porPagina" class="form-control">
                    <option value="5">5 por página</option>
                    <option value="10">10 por página</option>
                    <option value="30">30 por página</option>
                    <option value="50">50 por página</option>
                    <option value="100">100 por página</option>
                </select>
            </div>
    </div>
<!-- #endregion -->
    <table class="table-striped">
    @foreach ($noticias as $noticia)
        <tr class="table-light"><td align="center"><h3>{{$noticia->titulo}}</h3></td></tr>
        <tr><td align="right">Seccion: {{$noticia->categoria}}</td></tr>
        <tr>
            <td>
            <img src="{{$noticia->foto}}" alt="Foto de la noticia" class="p-3" style="width:150px; float:{{$noticia->ubicacion}}"> 
            <p>{{$noticia->contenido}}</p>
            </td>
        </tr>
        <tr><td><hr></td></tr>
        @endforeach
    </table>
    
        

        
   
{{$noticias->links()}}
</div>