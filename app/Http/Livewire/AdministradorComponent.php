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
    use WithFileUploads;

    public $paginationTheme = "bootstrap";

    public $filtro = "";
    public $porPagina = "10";
    public $titulo, $contenido, $foto, $categoria, $ubicacion;

    public function render()
    {
        $noticias = Noticia::latest()
                    ->where('titulo', 'LIKE', "%$this->filtro%")
                    ->orWhere('contenido', 'LIKE', "%$this->filtro%")
                    ->orWhere('categoria', 'LIKE', "%$this->filtro%")
                    ->paginate($this->porPagina);
        //$noticias = Noticia::latest()->paginate(20);
        return view('livewire.administrador-component', ['noticias'=>$noticias
        ]);
    }

    public function crearNoticia ()
    {
        $this->validate(
            [
            'foto' => 'image|max:1024', // 1MB Max
        ]);
        $nombreFoto = rand (0, 999) . $this->foto->getClientOriginalName();
        $this->foto->storeAs('public/fotos-noticias' ,$nombreFoto);
        
        //$this->foto->move('images/fotos_perfiles', $nombreFoto); //esto es para cambiar de lugar
        $urlFoto = "storage/fotos-noticias/". $nombreFoto;
        
        $ubicacionPre = array ('izquierda', 'derecha', 'centro');
        $ubicacion = $ubicacionPre[rand(0,2)];
        //dd($ubicacion);
        if ($this->categoria =="seleccione" || $this->categoria==null)
        {
            $this->categoria = 'noticia';
        }

        // if ($this->foto->hasFile('foto'))
        // {   
        //     $foto = $request->file('foto');
        //     $nombreFoto = $foto->getClientOriginalName();
        //     $perfil->url=$foto->move('images/fotos_perfiles', $nombreFoto);
        // }

        Noticia::create([
            'titulo'=>$this->titulo,
            'contenido'=>$this->contenido,
            'categoria'=>$this->categoria,
            'foto'=> $urlFoto,
            'ubicacion'=>$ubicacion
        ]);


        $this->reset();
        $this->emit('noticia', 'creo');
    }
}
