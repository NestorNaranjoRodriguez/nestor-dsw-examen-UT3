<?php
//Néstor Naranjo Rodriguez
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function store(Request $request)
    {
        $nombreProducto = $request->input('nombre-producto');
        $descripcionProducto = $request->input('descripcion-producto');
        $categoriaProducto = $request->input('categoria-producto');
        $precioProducto = $request->input('precio-producto');
        $unidadesProducto = $request->input('unidades-producto');

        $request->validate([
            'nombre-producto' => [
                'required',
                'min:3',
                'max:100',
            ],

            'descripcion-producto' => 'required',

            'categoria-producto' => [
                'required',
                'in:Electrónica,Deporte',
            ],

            'precio-producto' => [
                'required',
                'integer',
                'min:1',
                'max:3000',
            ],

            'unidades-producto' => [
                'required',
                'integer',
                'min:1',
            ],
        ]);

        $linea = '"' . $nombreProducto . '";"' . $descripcionProducto . '";"' . $categoriaProducto . '";"' . $precioProducto .'";"' . $unidadesProducto . "\"\n";

        file_put_contents(storage_path('app/productos.csv'), $linea, FILE_APPEND);
       return redirect()->route('product.create')->with('status', "Se han registrado $unidadesProducto unidades correctamente");
    }

}