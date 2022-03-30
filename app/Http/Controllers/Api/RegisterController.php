<?php
namespace App\Http\Controllers\Api;
use App\User;
use Illuminate\Http\Request;
use App\Notifications\SignupActivate;
use App\Http\Controllers\ApiController;
use Illuminate\Support\Facades\Validator;
class RegisterController extends ApiController
{
public function register(Request $request)
{
$validator = Validator::make($request->all(), [
'name' => 'required',
'email' => 'required|email|unique:users',
/* 'password' => 'required|confirmed', */
'password' => 'required',
'direccion' => 'required',
'telefono' => 'required',
'type_user_id' =>'required',
/* 'type_user_id' => 'in:' . User::ADMIN . ','
. User::SUB_ADMIN . ','
. User::SELLER . ','
. User::STORER . ','
. User::ACCOUNTANT . ','
. User::PRODUCTION . ','
. User::BILLER . ','
. User::ADMINISTRATION ,
'partner' => 'required|bool' */
]);
/* if ($request->hasFile('img_perfil')) {
$rules = [
'img_perfil' => 'mimes:jpg,jpeg,png|max:2048',
];

$this->validate($request, $rules);
} */

if ($validator->fails()) {
return $this->errorResponse($validator->errors(), 401);
}
$user = new User([
'name' => $request->name,
'email' => $request->email,
'direccion' => $request->direccion,
'telefono' => $request->telefono,
'password' => bcrypt($request->password),
'type_user_id'=> $request->type_user_id,
]);
/* if ($request->hasFile('img_perfil')) {
$image = file_get_contents($request->file('img_perfil')->path());
$base64Image = base64_encode($image);
$user->image = $this->saveImages($base64Image, 'users', $user->id);
} */
$user->save();
/* $user->notify(new SignupActivate($user));
 */
return response()->json(['message' => 'Por favor, confirme haciendo clic en el botón verificar usuario que se le envió en su correo electrónico'], 201);
}
}