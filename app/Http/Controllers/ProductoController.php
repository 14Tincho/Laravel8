<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Marca;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{

    public function index(){
        $productos = Producto::with('relMarca','relCategoria')->paginate(4);
        return view('/productos',(['productos'=>$productos]));
    }

    public function create(){
        $marcas = Marca::all();
        $categorias = Categoria::all();
        return view('agregarProducto',['marcas'=>$marcas,'categorias'=>$categorias]);
    }

    public function store(Request $request){

        $this->validar($request);

        $prdImagen = $this->subirImagen($request);
        $prdNombre = $request->input('prdNombre');

        $producto = new Producto;
        $producto->prdNombre = $prdNombre;
        $producto->prdPrecio = $request->input('prdPrecio');
        $producto->idMarca = $request->input('idMarca');
        $producto->idCategoria = $request->input('idCategoria');
        $producto->prdPresentacion = $request->input('prdPresentacion');
        $producto->prdStock = $request->input('prdStock');
        $producto->prdImagen = $prdImagen;

        $producto->save();

        return redirect('/productos')->with('mensaje', 'Se agrego correctamente el producto: '. $prdNombre)->with('clase','alert-success');
    }

    public function edit($id){
        $marcas = Marca::all();
        $categorias = Categoria::all();
        $producto = Producto::with('relMarca','relCategoria')->find($id);
        return view('/modificarProducto',['marcas'=>$marcas, 'categorias'=>$categorias, 'producto'=>$producto]);
    }

    public function update(Request $request){
        $this->validar($request);

        $prdImagen = $this->modImagen($request);

        $producto = Producto::find($request->input('idProducto'));
        $producto->prdNombre = $request->input('prdNombre');
        $producto->prdPrecio = $request->input('prdPrecio');
        $producto->idMarca = $request->input('idMarca');
        $producto->idCategoria = $request->input('idCategoria');
        $producto->prdPresentacion = $request->input('prdPresentacion');
        $producto->prdStock = $request->input('prdStock');
        $producto->prdImagen = $prdImagen;

        $producto->save();

        return redirect('/productos')->with('mensaje', 'Producto: ' . $request->input('prdNombre') . ' actualizado correctamente')->with(['clase'=>'alert-success']);
    }

    public function confirmarBaja($id){
        $producto = Producto::with('relMarca','relCategoria')->find($id);
        return view('eliminarProducto',['producto'=>$producto]);
    }

    public function destroy(Request $request){
        $producto = Producto::find($request->input('idProducto'));
        $prdNombre = $request->input('prdNombre');
        $producto->delete();
        return redirect('/productos')->with('mensaje','Se elimino correctamente el producto '. $prdNombre)->with('clase','alert-danger');
    }

    public function validar(Request $request){
        $request->validate(
            [
                'prdNombre'=>'required|min:3|max:30',
                'prdPrecio'=>'required|numeric|min:0',
                'prdPresentacion'=>'required|min:3|max:150',
                'prdStock'=>'required|integer|min:1',
                'prdImagen'=>'mimes:jpg,jpeg,png,gif,svg,webp|max:2048'
            ],
            [
                'prdNombre.required'=>'Complete el campo Nombre',
                'prdNombre.min'=>'Complete el campo Nombre con al menos 3 caractéres',
                'prdNombre.max'=>'Complete el campo Nombre con 30 caractéres como máxino',
                'prdPrecio.required'=>'Complete el campo Precio',
                'prdPrecio.numeric'=>'Complete el campo Precio con un número',
                'prdPrecio.min'=>'Complete el campo Precio con un número positivo',
                'prdPresentacion.required'=>'Complete el campo Presentación',
                'prdPresentacion.min'=>'Complete el campo Presentación con al menos 3 caractéres',
                'prdPresentacion.max'=>'Complete el campo Presentación con 150 caractérescomo máxino',
                'prdStock.required'=>'Complete el campo Stock',
                'prdStock.integer'=>'Complete el campo Stock con un número entero',
                'prdStock.min'=>'Complete el campo Stock con un número positivo',
                'prdImagen.mimes'=>'Debe ser una imagen',
                'prdImagen.max'=>'Debe ser una imagen de 2MB como máximo'
            ]
        );
    }

    public function subirImagen($request){
        $prdImagen = 'noDisponible.jpg';
        if ($request->file('prdImagen')) {
            $prdImagen = time().'.'.$request->file('prdImagen')->clientExtension();
            $request->file('prdImagen')->move(public_path('image/'), $prdImagen);
        }
        return $prdImagen;
    }

    public function modImagen(Request $request){
        if (!$request->file('prdImagen')) {
            $producto = Producto::find($request->input('idProducto'));
            $prdImagen = $producto->prdImg = $request->input('prdImg');;
        }
        if ($request->file('prdImagen')) {
            $prdImagen = time().'.'.$request->file('prdImagen')->clientExtension();
            $request->file('prdImagen')->move(public_path('image/'), $prdImagen);
        }
        return $prdImagen;
    }
}
