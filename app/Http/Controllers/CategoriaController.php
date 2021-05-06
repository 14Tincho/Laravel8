<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(){
        $categorias = Categoria::paginate(7);
        return view('/categorias',['categorias'=>$categorias]);
    }

    public function create(){
        return view('/agregarCategoria');
    }

    public function store(Request $request){
        $this->validar($request);

        $catNombre = $request->input('catNombre');

        $categoria = new Categoria;
        $categoria->catNombre = $catNombre;
        $categoria->save();
        return redirect('/categorias')->with('mensaje','Se agrego correctamente la categoria: '. $catNombre)->with('clase', 'alert-success');
    }

    public function edit($idCategoria){
        $categoria = Categoria::find($idCategoria);
        return view('modificarCategoria',['categoria'=>$categoria]);
    }

    public function update(Request $request){

        $this->validar($request);

        $catNombre = $request->input('catNombre');

        $categoria = Categoria::find($request->input('idCategoria'));
        $categoria->catNombre = $catNombre;
        $categoria->save();

        return redirect('/categorias')->with('mensaje','Se modifico correctamente la categoria '. $catNombre)->with('clase','alert-success');

    }

    public function confirmarBaja($idCategoria){
        $categoria = Categoria::find($idCategoria);
        return view('/eliminarCategoria',['categoria'=>$categoria]);
    }

    public function destroy(Request $request){

        $categoria = Categoria::find($request->input('idCategoria'));
        $catNombre = $categoria->catNombre;
        $categoria->delete();

        return redirect('/categorias')->with('mensaje','Se elimino correctamente la categoria '. $catNombre)->with('clase','alert-danger');
    }

    public function validar(Request $request){
        $request->validate(
            [
                'catNombre'=> 'required|min:2|max:30'
            ],
            [
                'catNombre.required'=>'Que el nombre es obligatorio, un solo campo tenes q completar, no es muy dificil',
                'catNombre.min'=>'Creo q te faltaron algunas letras, osea el minimo es dos, hay q ser boludo para poner un solo digito',
                'catNombre.max'=>'Te dormiste en el teclado boludo? como vas a poner mas de 30 caracteres?'
            ]
        );
    }
}
