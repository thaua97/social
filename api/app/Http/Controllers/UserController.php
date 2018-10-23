<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\User;
use Auth;


class UserController extends Controller
{
    //
    public function login(Request $request) {
        
        $data = $request->all();
    
        $validate = Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string'],
        ]);
    
        if ($validate->fails()) {
            return [
                'status' => false, 
                "validacao" => true, 
                "erros" => $validate->errors()
            ];
        }
    
    
        if (Auth::attempt(['email'=> $data['email'], 'password'=>$data['password']])) {
            $user = auth()->user();
            
            $user->image = asset($user->image);
            $user->token = $user->createToken($user->email)->accessToken;
    
            return [ 
                'status' => true, 
                'user' => $user 
            ];
            
        } else {
            return ['status' => false];
        }
    }

    public function register(Request $request){
        
        $data = $request->all();
    
        $validate = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    
        if ($validate->fails()) {
            return [
                'status' => false, 
                "validacao" => true, 
                "erros" => $validate->errors()
            ];
        }
        $image = "/perfils/padrao.png";
    
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'image' => $image
        ]);
    
        $user->token = $user
                    ->createToken($user->email)
                    ->accessToken;
        $user->image = asset($user->image);
    
        return [
          'status' => true,
          'user' => $user
        ];
    }

    public function perfil(Request $request){

        $user = $request->user();
        $data = $request->all();

        if(isset($data['password'])){
        $validate = Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
            'password' => ['required','string','min:6','confirmed']
        ]);
        if($validate->fails()){
            return [
                'status' => false, 
                "validacao" => true, 
                "erros" => $validate->errors()
            ];
        }
        $user->password = bcrypt($data['password']);

        }else{
            $validate= Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required','string','email','max:255',Rule::unique('users')->ignore($user->id)]
        ]);

        if($validate->fails()){
            return [
                'status' => false, 
                "validacao" => true, 
                "erros" => $validate->errors()
            ];
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
        return [
            'status' => true,
            'user' => $user
        ];

    }
}
