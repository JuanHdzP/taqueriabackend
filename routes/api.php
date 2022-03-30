<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/* Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
}); */

/* Route::get('/categorias','Apicontroller@cargacategorias');
Route::get('/productos','Apicontroller@cargaproductos');
Route::get('/productos/{id}','Apicontroller@buscaproducto');
Route::delete('/productos/{id}','Apicontroller@eliminaproducto');
Route::post('/productos','Apicontroller@altaproducto'); */

/* Route::group(['middleware' => 'auth:sanctum'], function () {
 */
Route::resource('categorias', 'Api\ApicategoriasController');
Route::resource('productos', 'Api\ApiproductosController');
Route::resource('users', 'Api\ApiusersController');
Route::resource('ventas', 'Api\ApiventasController');
Route::resource('ventasdetalle', 'Api\ApiventadetalleController');
Route::resource('typeusers', 'Api\ApitypeusersController');
Route::post('logout','App\Http\Controllers\Api\LoginController@logout');

/* });
*/


Route::post('login','App\Http\Controllers\Api\LoginController@login');
Route::post('register','App\Http\Controllers\Api\RegisterController@register');

