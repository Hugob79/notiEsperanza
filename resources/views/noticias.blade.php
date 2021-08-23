<div class="m-1 p-1">
    <!-- #region Buscador -->
    <div class="form-inline">
                <div class="mb-2">
                    <input wire:model.debounce.500ms="filtro" class="form-control input-sm" type="text" placeholder="Buscar...">
            
                    <select wire:model="porPagina" class="form-control">
                        <option value="6">6 por página</option>
                        <option value="12">12 por página</option>
                        <option value="36">36 por página</option>
                        <option value="72">72 por página</option>
                        
                    </select>
                </div>
        </div>
    <!-- #endregion -->
    <!-- <table class="table-striped">
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
    </table> -->
    
        
    @foreach ($noticias as $noticia )
     <div class="pr-3 pl-3 mb-3" style="vertical-align: top; min-height:400px; display: inline-block; width:33%; border-right: 1px solid grey; ">
        <h3>{{$noticia->titulo}}</h3>
        <div class="text-right"><strong>{{$noticia->categoria}}</strong></div><br>
        <div style="font-size:16px;font-family: Verdana, Geneva, Tahoma, sans-serif;">{{$noticia->contenido}}</div>
        <img src="{{$noticia->foto}}" alt="Foto de la noticia" style="float:{{$noticia->ubicacion}}; width:80%;">
    </div>   

    @endforeach

        
   
{{$noticias->links()}}
</div>