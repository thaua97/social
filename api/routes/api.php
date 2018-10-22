<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
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

Route::post('/login', function(Request $request) {
    $data = $request->all();
    
    $validate = Validator::make($data, [
        'email' => ['required', 'string', 'email', 'max:255'],
        'password' => ['required', 'string'],
    ]);

    if ($validate->fails()) {
        return $validate->errors();
    }


    if (Auth::attempt(['email'=>$data['email'], 'password'=>$data['password']])) {
        $user = auth()->user();
        
        $user->image = asset($user->image);
        $user->token = $user->createToken($user->email)->accessToken;

        return $user;
        
    } else {
        return ['status'=>false];
    }

});


Route::middleware('auth:api')->get('/usuario', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->put('/perfil', function (Request $request) {
    $user = $request->user();
    $data = $request->all();

    if(isset($data['password'])){
      $validate = Validator::make($data, [
          'name' => ['required', 'string', 'max:255'],
          'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
          'password' => ['required','string','min:6','confirmed']
      ]);
      if($validate->fails()){
        return $validate->errors();
      }
      $user->password = bcrypt($data['password']);

    }else{
        $validate= Validator::make($data, [
          'name' => ['required', 'string', 'max:255'],
          'email' => ['required','string','email','max:255',Rule::unique('users')->ignore($user->id)]
      ]);

      if($validate->fails()){
        return $validate->errors();
      }
      $user->name = $data['name'];
      $user->email = $data['email'];
    
    }

    if(isset($data['image'])){
      $time = time();
      
      $mainDir = 'perfils';
      
      $imageDir = $mainDir.DIRECTORY_SEPARATOR.'perfil_id'.$user->id;
      
      $ext = substr($data['image'], 11, strpos($data['image'], ';') - 11);
      
      $urlImage = $imageDir.DIRECTORY_SEPARATOR.$time.'.'.$ext;

      $file = str_replace('data:image/' .$ext. ';base64,', '', $data['image']);
      
      $file = base64_decode($file);

        if(!file_exists($mainDir)){
            mkdir($mainDir, 0700);
        }
        if ($user->image) {
            if (file_exists($user->image)) {
                unlink($user->image);
            }
        }
        if(!file_exists($imageDir)){
            mkdir($imageDir, 0700);
        }

        file_put_contents($urlImage, $file);

        $user->image = $urlImage;

    }

    $user->save();

    $user->image = asset($user->image);
    $user->token = $user->createToken($user->email)->accessToken;
    return $user;
});