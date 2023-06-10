<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LibrosController extends Controller
{
    public function index()
    {
        $librosList = Libro::all();
        return view('libros.all', ['librosList' => $librosList]);
    }

    public function mislibros()
    {
        $librosList = DB::table('libros_usuarios')
            ->join('libros', 'libros.id', '=', 'libros_usuarios.id_libro')
            ->where('libros_usuarios.id_usuario', '=', auth()->id())
            ->get();
            return view('libros.mislibros', ['librosList' => $librosList]);
    }

    public function create()
    {
        $libros = Libro::all();
        return view('libros.create', ['libros' => $libros]);
    }

    public function store(Request $r)
    {

        $libro = new Libro($r->all());
        $libro->save();

        return redirect()->route('libro.index');
    }

    public function show($id)
    {
        $libro = Libro::find($id);
        $data['libro'] = $libro;

        $estado = DB::table('libros_usuarios')
        ->join('libros', 'libros.id', '=', 'libros_usuarios.id_libro')
        ->where('libros_usuarios.id_usuario', '=', auth()->id())
        ->where('libros_usuarios.id_libro', '=', $id)
        ->get();

        $usuarios = DB::table('libros_usuarios')
        ->join('users', 'users.id', '=', 'libros_usuarios.id_usuario')
        ->where('libros_usuarios.id_libro', '=', $id)
        ->where('id', '<>', 1)
        ->where('id', '<>', auth()->id())
        ->get();

        if(count($usuarios) == 0){
            $usuarios = DB::table('users')
            ->where('id', '<>', 1)
            ->where('id', '<>', auth()->id())
            ->get();
        }

        $prestado = DB::table('libros_prestados')
        ->join('users', 'users.id', '=', 'libros_prestados.id_usuario_presta')
        ->where('libros_prestados.id_usuario_prestado', '=', auth()->id())
        ->where('libros_prestados.id_libro', '=', $id)
        ->get();

        return view('libros.show', [
            'data' => $data,
            'estado' => $estado,
            'usuarios' => $usuarios,
            'prestado' => $prestado
        ]);
    }

    public function edit($id)
    {
        $libro = Libro::find($id);
        return view('libros.edit', array('libro' => $libro));
    }

    public function update(Request $r, $id)
    {
        $libro = Libro::find($id);
        $libro->titulo = $r->titulo;
        $libro->autor = $r->autor;
        $libro->sinopsis = $r->sinopsis;
        $libro->portada = $r->portada;
        $libro->fecha_publicacion = $r->fecha_publicacion;
        $libro->genero = $r->genero;
        $libro->precio = $r->precio;
        $libro->save();
        return redirect()->route('libro.show',$id);
    }

    public function updateEstado($id)
    {
        DB::table('libros_usuarios')
                    ->where('id_libro', $id)
                    ->update(['estado' => 'Leído', 'leido' => 'S']);

        return redirect()->route('libro.show',$id);
    }

    public function comprar($id)
    {
        $values = array('id_libro' => $id, 'id_usuario' => auth()->id(), 'estado' => 'En proceso de lectura', 'leido' => 'N', 'valoracion' => 0);
        DB::table('libros_usuarios')->insert($values);

        DB::table('libros_prestados')
        ->where('id_libro', '=', $id)
        ->delete();

        return redirect()->route('libro.show',$id);
    }

    public function prestar($id, Request $request)
    {
        $values = array('id_libro' => $id, 'id_usuario_presta' => auth()->id(), 'id_usuario_prestado' => $request->prestar);
        DB::table('libros_prestados')->insert($values);

        return redirect()->route('libro.show',$id);
    }

    public function comentar($id, Request $request)
    {
        $values = array('id_libro' => $id, 'id_usuario' => auth()->id(), 'comentario' => $request->comentario);
        DB::table('libros_comentarios')->insert($values);

        return redirect()->route('libro.show',$id);
    }

    public function updateValoracion($id, $valor)
    {
        DB::table('libros_usuarios')
                    ->where('id_libro', $id)
                    ->update(['valoracion' => $valor]);

        return redirect()->route('libro.show',$id);
    }

    public function destroy($id)
    {
        $libro = Libro::find($id);
        $libro->delete();
        return redirect()->route('libro.index');
    }

    public function buscador(Request $request){
        $librosList = Libro::where('autor', 'LIKE',$request->texto."%")
        ->orWhere('titulo', 'LIKE', '%'.$request->texto.'%')
        ->orWhere('genero', 'LIKE', '%'.$request->texto.'%')
        ->orWhere('precio', 'LIKE', '%'.$request->texto.'%')
        ->get();
        return view("libros.busqueda", array('librosList' => $librosList));
    }

}
