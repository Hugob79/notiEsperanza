<div>

    <div class="row">


        <div class="col-sm-3">
        @if ($vistaNoticia == 'crear')
            @include('administrador.crear')
        @elseif ($vistaNoticia == 'editar')
            @include('administrador.editar')
        @endif
              
        </div>
            
        
        
        <div class="col-sm-9">
        {{$vistaNoticia}}
            @include('administrador.tabla-admin')
        </div>

    </div>

</div>
