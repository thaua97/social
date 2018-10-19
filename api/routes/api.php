<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;

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

Route::post('/cadastro', function(Request $request) {
    $data = $request->all();
    
    $validate = Validator::make($data, [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        'password' => ['required', 'string', 'min:6', 'confirmed'],
    ]);

    if ($validate->fails()) {
        return $validate->errors();
    }

    $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
    ]);

    $user->token = $user
                ->createToken($user->email)
                ->accessToken;

    return $user;

});

Route::middleware('auth:api')->get('/usuario', function (Request $request) {
    return $request->user();
});


Route::get('/teste', function(Request $request) {
    return "ok";
});

Route::post('/teste-post', function(Request $request) {
    return $request->all();
});