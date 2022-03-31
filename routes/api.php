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
*/

Route::get('/categorias', 'Apicontroller@cargacategorias');
Route::get('/categorias/{id}','Apicontroller@buscacategoria');
Route::delete('/categorias/{id}','Apicontroller@eliminacategoria');
Route::post('/categorias','Apicontroller@altacategoria');
Route::put('/categorias/{id}','Apicontroller@modifcategoria');

Route::get('/productos','Apicontroller@cargaproductos');
Route::get('/productos/{id}','Apicontroller@buscaproducto');
Route::delete('/productos/{id}','Apicontroller@eliminaproducto');
Route::post('/productos','Apicontroller@altaproducto');
Route::put('/productos/{id}','Apicontroller@modifproducto');

Route::get('/users','Apicontroller@cargausuarios');
Route::get('/users/{id}','Apicontroller@buscausuario');
Route::delete('/users/{id}','Apicontroller@eliminausuario');
Route::post('/users','Apicontroller@altausuario');
Route::put('/users/{id}','Apicontroller@modifusuario');

Route::get('/typeusers','Apicontroller@cargatypeusers');
Route::get('/typeusers/{id}','Apicontroller@buscatypeuser');
Route::delete('/typeusers/{id}','Apicontroller@eliminatypeuser');
Route::post('/typeusers','Apicontroller@altatypeuser');
Route::put('/typeusers/{id}','Apicontroller@modiftypeuser');

Route::get('/ventas','Apicontroller@cargaventas');
Route::get('/ventas/{id}','Apicontroller@buscaventa');
Route::delete('/ventas/{id}','Apicontroller@eliminaventa');
Route::post('/ventas','Apicontroller@altaventa');
Route::put('/ventas/{id}','Apicontroller@modifventa');
/* Route::group(['middleware' => 'auth:sanctum'], function () {
 */
/* Route::resource('productos', 'Api\ApiproductosController');
 */
/* Route::resource('users', 'Api\ApiusersController'); */
/* Route::resource('ventas', 'Api\ApiventasController');
 */Route::resource('ventasdetalle', 'Api\ApiventadetalleController');
/* Route::resource('typeusers', 'Api\ApitypeusersController');
 */Route::post('logout','App\Http\Controllers\Api\LoginController@logout');

/* });
*/


Route::post('login','App\Http\Controllers\Api\LoginController@login');
Route::post('register','App\Http\Controllers\Api\RegisterController@register');

