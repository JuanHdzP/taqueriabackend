<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Producto;
use App\Categoria;
use App\User;
use App\TypeUser;
use App\Venta;


/* use App\Traits\ApiResponser;
 */


class Apicontroller extends Controller
{
    //
    public function cargacategorias(){
        $categorias = Categoria::orderby('nombre','ASC')->get();
        return response()->json([
            'status'=>200,
            'categorias'=>$categorias,
        ]);
    } 

    public function buscacategoria($id){
        $categoria = Categoria::findOrfail($id);
        return response()->json($categoria,201);
    }        

    public function eliminacategoria($id){
        $consulta=Categoria::find($id);
        $consulta->delete();
        return response()->json(null,204);
    }
    public function altacategoria(Request $request){
        $consulta=Categoria::create($request->all());
        return response()->json($consulta,201);
    } 
    public function modifcategoria(Request $request){
        $categoria=Categoria::create($request->all());
        return response()->json($categoria,201);
    } 


    public function cargaproductos(){
        $productos = \DB::select("select p.id, p.nombre, p.precio, p.foto,p.descripcion, 
        p.categoria_id,c.nombre as categoriaproducto from productos as p
        inner join categorias as c on c.id = p.categoria_id order by p.nombre asc");
        return response()->json([
            'status'=>200,
            'productos'=>$productos,
        ]);
    }

    public function buscaproducto($id){
        $consulta=\DB::select("select p.id, p.nombre, p.precio, p.foto,p.descripcion, 
        p.categoria_id,c.nombre as categoriaproducto from productos as p
        inner join categorias as c on c.id = p.categoria_id where p.id=$id order by p.nombre asc");
        return response()->json($consulta[0],201);
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

    public function modifproducto(Request $request){
        $producto=Producto::create($request->all());
        return response()->json($producto,201);
    } 

    public function cargausuarios(){
        $users = \DB::select("select u.id, u.name, u.email, u.img_perfil, u.direccion, 
        u.telefono, u.type_user_id, t.nombre as tipousuario from users as u
        inner join type_users as t on t.id = u.type_user_id order by u.name asc");
        return response()->json([
            'status'=>200,
            'users'=>$users,
        ]);
    }

    public function buscausuario($id){
        $user = \DB::select("select u.id, u.name, u.email, u.img_perfil, u.direccion, 
        u.telefono, u.type_user_id, t.nombre as tipousuario from users as u
        inner join type_users as t on t.id = u.type_user_id where u.id=$id");
        return response()->json($user[0],201);
    }
    public function eliminausuario($id){
        $consulta=User::find($id);
        $consulta->delete();
        return response()->json(null,204);
    }
    public function altausuario(Request $request){
        $consulta=User::create($request->all());
        return response()->json($consulta,201);
    } 

    public function modifusuario(Request $request){
        $usuario=Usuario::create($request->all());
        return response()->json($usuario,201);
    }


    public function cargatypeusers(){
        $typeusers = TypeUser::orderby('nombre','ASC')->get();
        return response()->json([
            'status'=>200,
            'typeusers'=>$typeusers,
        ]);
    } 

    public function buscatypeuser($id){
        $typeuser = TypeUser::findOrfail($id);
        return response()->json($typeuser,201);
    }        

    public function eliminatypeuser($id){
        $consulta=TypeUser::find($id);
        $consulta->delete();
        return response()->json(null,204);
    }
    public function altatypeuser(Request $request){
        $consulta=TypeUser::create($request->all());
        return response()->json($consulta,201);
    } 

    public function modiftypeuser(Request $request){
        $typeuser=TypeUser::create($request->all());
        return response()->json($typeuser,201);
    }

    public function cargaventas(){
        $ventas = \DB::select("select v.fecha, v.total, v.id,
        v.cliente_id,v.empleado_id, u.name as cliente, u1.name as empleado from ventas as v
        inner join users as u on v.cliente_id = u.id 
        inner join users as u1 on v.empleado_id = u1.id");
        return response()->json([
            'status'=>200,
            'ventas'=>$ventas,
        ]);
    }

    public function buscaventa($id){
        $venta = Venta::findOrfail($id);
        return response()->json($venta,201);
    }
    public function eliminaventa($id){
        $consulta=Venta::find($id);
        $consulta->delete();
        return response()->json(null,204);
    }
    public function altaventa(Request $request){
        $consulta=Venta::create($request->all());
        return response()->json($consulta,201);
    } 
    public function modifventa(Request $request){
        $venta=Venta::create($request->all());
        return response()->json($venta,201);
    }
/*     use ApiResponser;
 */
}
