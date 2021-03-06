<?php
use App\User;
use App\Content;
use App\Comment;
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
Route::post('/cadastro', 'UserController@register');

Route::post('/entrar', 'UserController@login');

Route::middleware('auth:api')->put('/perfil', 'UserController@perfil');

Route::middleware('auth:api')->post('/content/add', 'ContentController@add');

Route::middleware('auth:api')->get('/content/list', 'ContentController@list');

Route::middleware('auth:api')->get('/content/page/list/{id}', 'ContentController@page');

Route::middleware('auth:api')->put('/content/like/{id}', 'ContentController@like');

Route::middleware('auth:api')->put('/content/comment/{id}', 'ContentController@comment');

Route::get('/testes', function(){
   
    //$user = User::find(2);
    //
    //$content = Content::find(26);
    //$user->comments()->create([
    //    'content_id' => $content->id,
    //    'text' => 'Um comentario teste asdasdasdas.',
    //    'date' =>  date('Y-m-d H:i:s'),
    //]);


   // $conteudos = Content::all();
   // foreach($conteudos as $key => $value){
   //     $value->delete();
   // }

    //return $conteudos;
    //add amigo: 
    //$user->friends()->detach($user2->id);
    //$user->friends()->toggle($user2->id);
    
    /*
    $content = Content::find(1);
    $user->likes()->toggle($content->id);
    //Conta das curtidas
    //return $content->likes()->count();
    return $content->likes;
    */

    //add comentario
    //$content = Content::find(1);
    //$user->comments()->create([
    //    'content_id' => $content->id,
    //    'text' => 'Um comentario.',
    //    'date' =>  date('Y-m-d'),
    //]);
//
    //$user2->comments()->create([
    //    'content_id' => $content->id,
    //    'text' => 'No like this shit.',
    //    'date' =>  date('Y-m-d'),
    //]);
    //return $content->comments;

});