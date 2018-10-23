<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Content;

class ContentController extends Controller
{
    public function add(Request $request){
        
        $data = $request->all();
        $user = $request->user();

        //Validação

        //Novo Objeto
        $content = new Content;

        $content->title = $data['title'];
        $content->text = $data['text'];
        $content->image = $data['image'] ? $data['image'] : '#';
        $content->date = date('Y-m-d H:i:s');

        $user->contents()->save($content);

        return [
            'status' => true,
            'content' => $user->contents
        ];
    }
}
