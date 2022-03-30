<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categoria;
use App\Producto;


class Apicontroller extends Controller
{
    //
    public function cargacategorias(){
        $consulta = Categoria::orderby('nombre','ASC')->get();
        return response()->json($consulta,201);
    }

    public function cargaproductos(){
        $consulta = \DB::select("select p.id, p.nombre, p.precio, p.foto,p.descripcion, 
        p.categoria_id,c.nombre as categoriaproducto from productos as p
        inner join categorias as c on c.id = p.id order by p.nombre asc");
        return response()->json($consulta,201);
    }

    public function buscaproducto($id){
        $consulta=\DB::select("select p.id, p.nombre, p.precio, p.foto,p.descripcion, 
        p.categoria_id,c.nombre as categoriaproducto from productos as p
        inner join categorias as c on c.id = p.id where p.id=$id order by p.nombre asc");
        return response()->json($consulta,201);
    }
    public function eliminaproducto($id){
        $consulta=Producto::find($id);
        $consulta->delete();
        return response()->json(null,204);
    }
    public function altaproducto(Request $request){
        $consulta=Producto::create($request->all());
        return response()->json($consulta,201);
    }
}
