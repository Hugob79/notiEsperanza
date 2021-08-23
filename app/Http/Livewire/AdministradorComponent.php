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
    public $idNoticiaActualizar, $titulo, $contenido, $foto="", $categoria, $ubicacion;
    
    public $vistaNoticia="crear";

    public function render()
    {
        $noticias = Noticia::latest()
                    ->where('titulo', 'LIKE', "%$this->filtro%")
                    ->orWhere('contenido', 'LIKE', "%$this->filtro%")
                    ->orWhere('categoria', 'LIKE', "%$this->filtro%")
                    ->paginate($this->porPagina);
        //$noticias = Noticia::latest()->paginate(20);
        return view('livewire.administrador-component', ['noticias'=>$noticias]);
    }

    public function crearNoticia ()
    {
        $this->validate(
            [
            'foto' => 'image|max:1024', // 1MB Max
            'titulo'=>'required',
            'contenido'=>'required'
        ]);
        
       
        $ubicacionPre = array ('left', 'right', 'center');
        $ubicacion = $ubicacionPre[rand(0,2)];
       
        if ($this->categoria =="seleccione" || $this->categoria==null)
        {
            $this->categoria = 'noticia';
        }

        if (($this->foto !=null) || $this->foto != "")
        {   
            $nombreFoto = rand (0, 999) . $this->foto->getClientOriginalName();
            $urlFoto = "/storage/fotos-noticias/". $nombreFoto;
            $this->foto->storeAs('public/fotos-noticias' ,$nombreFoto);
        }else{
            $urlFoto = "/storage/fotos-noticias/sin-imagen.jpg";
        }

        Noticia::create([
            'titulo'=>$this->titulo,
            'contenido'=>$this->contenido,
            'categoria'=>$this->categoria,
            'foto'=> $urlFoto,
            'ubicacion'=>$ubicacion
        ]);


        $this->reset();
        $this->foto="";
        

        $this->dispatchBrowserEvent('swal', [
            'title' => 'Noticia creada!',
            'timer'=>3000,
            'icon'=>'success',
            'toast'=>true,
            'position'=>'top-right'
        ]);
    }

    function editarNoticia($notiID)
    {
        $this->vistaNoticia="editar";
        $noticiaEditar = Noticia::find($notiID);
        $this->idNoticiaActualizar = $noticiaEditar->id;
        $this->titulo = $noticiaEditar->titulo;
        $this->contenido = $noticiaEditar->contenido;
        $this->categoria = $noticiaEditar->categoria;
    }

    function actualizarNoticia()
    {
        Noticia::where('id', $this->idNoticiaActualizar)->update(
            [
                'titulo' => $this->titulo,
                'contenido' => $this->contenido,
                'categoria' => $this->categoria
            ]);

            $this->dispatchBrowserEvent('swal', [
                'title' => 'Noticia actualizada!',
                'timer'=>3000,
                'icon'=>'success',
                'toast'=>true,
                'position'=>'top-right'
            ]);
    }

    function volverCrear()
    {
        $this->reset();
        $this->vistaNoticia="crear";
    }
    
    function borrarNoticia($idNoticia)
    {
        $noticia = Noticia::find($idNoticia);
        $urlFotoNoticia = $noticia->foto;
        $urlRAIZ = getcwd();

        if ($urlFotoNoticia != "/storage/fotos-noticias/sin-imagen.jpg")
        {
            if(file_exists($urlRAIZ . $urlFotoNoticia))
            {
                unlink ($urlRAIZ . $urlFotoNoticia);
            }
        }

        Noticia::destroy($idNoticia);
        
        $this->dispatchBrowserEvent('swal', [
            'title' => 'Noticia borrada!',
            'timer'=>3000,
            'icon'=>'warning',
            'toast'=>true,
            'position'=>'top-right'
        ]);
    }
}
