<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Noticia;

class NoticiasComponent extends Component
{
    use WithPagination;

    public $filtro = "";
    public $porPagina = "6";
    public $categoria='';

    public $paginationTheme = "bootstrap"; //Es importante ponerlo porque si no se va todo al carajo

    public function render()
    {
        if ($this->categoria != "")
        {
            $noticias = Noticia::latest()
            ->Where('categoria', $this->categoria)
            ->Where('titulo', 'LIKE', "%$this->filtro%")
            ->Where('contenido', 'LIKE', "%$this->filtro%")
            ->paginate($this->porPagina)->onEachSide(1); //con eachside puedo optimizar para celu
        }else{
            $noticias = Noticia::latest()
            ->Where('titulo', 'LIKE', "%$this->filtro%")
            ->orWhere('contenido', 'LIKE', "%$this->filtro%")
            ->orWhere('categoria', 'LIKE', "%$this->filtro%")
            ->paginate($this->porPagina)->onEachSide(1);
        }
        
        if (count($noticias)>=1)
        {
            //dd($noticias);
            return view('livewire.noticias-component', ['noticias'=>$noticias]); 
        }else{
            //dd($noticias);
            return view('livewire.noticias-component', ['noticias'=>'vacio']); 
        }

       
       
        

        
    }
}
