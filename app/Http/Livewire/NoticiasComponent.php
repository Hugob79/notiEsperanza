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

    public $paginationTheme = "bootstrap"; //Es importante ponerlo porque si no se va todo al carajo

    public function render()
    {

        $noticias = Noticia::latest()
        ->where('titulo', 'LIKE', "%$this->filtro%")
        ->orWhere('contenido', 'LIKE', "%$this->filtro%")
        ->orWhere('categoria', 'LIKE', "%$this->filtro%")
        ->paginate($this->porPagina);

        return view('livewire.noticias-component', ['noticias'=>$noticias]);
    }
}
