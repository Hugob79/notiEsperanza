<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;

use Illuminate\Support\Facades\Gate;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Noticia;

class AdministradorComponent extends Component
{
    use WithPagination;
    public $paginationTheme = "bootstrap";

    public $filtro = "";
    public $porPagina = "10";
    public $titulo, $contenido, $foto, $categoria, $ubicacion;

    public function render()
    {
        $noticias = Noticia::latest()->paginate(20);
        return view('livewire.administrador-component', ['noticias'=>$noticias
        ]);
    }

    public function crearNoticia ()
    {
        $this->validate(
            [
            'foto' => 'image|max:1024', // 1MB Max
        ]);

        $nombreFoto = $this->image->store('fotos-noticias/');
        $validatedData['image'] = str_replace("fotos-noticias/", $nombreFoto);

        //$this->foto->store('fotos-noticias');
    }
}
