<?php

namespace App\Http\Controllers;

use App\Models\Marca;
use Illuminate\Http\Request;

class MarcaController extends Controller
{
    public function index(){
        $marcas = Marca::paginate(7);
        return view('marcas',['marcas'=>$marcas]);
    }

    public function create(){
        return view('agregarMarca');
    }

    public function store(Request $request){
        $mkNombre = $request->input('mkNombre');
        $this->validar($request);

        $Marca = new Marca;
        $Marca->mkNombre = $mkNombre;
        $Marca->save();

        return redirect('/marcas')->with('mensaje', 'Se agrego correctamente la marca: ' . $mkNombre)->with('clase', 'alert-success');

    }

    public function edit($id){
        $marca = Marca::find($id);
        return view('/modificarMarca', ['marca'=>$marca]);
    }

    public function update(Request $request){
        $this->validar($request);
        $mkNombre = $request->input('mkNombre');

        $marca = Marca::find($request->input('idMarca'));
        $marca->mkNombre = $mkNombre;
        $marca->save();

        return redirect('/marcas')->with('mensaje', 'Modificamos correctamente la marca: '. $mkNombre)->with('clase','alert-success');
    }

    public function confirmarBaja($id){
        $marca = Marca::find($id);
        return view('eliminarMarca', ['marca'=>$marca]);
    }

    public function destroy(Request $request){
        $marca = Marca::find($request->input('idMarca'));
        $mkNombre = $marca->mkNombre;
        $marca->delete();
        return redirect('/marcas')->with('mensaje','Se elimino la marca: '.$mkNombre)->with('clase','alert-danger');
    }

    public function validar(Request $request){
        $request->validate(
            [
                'mkNombre' => 'required|max:50|min:2'
            ],
            [
                'mkNombre.required' => 'El nombre de la marca es obligatorio',
                'mkNombre.max' => 'El nombre de marca tiene que tener menos de 50 carácteres',
                'mkNombre.min' => 'El nombre de marca tiene que tener mas de 2 carácteres'
            ]
        );
    }
}
