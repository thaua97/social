<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Content;

class ContentController extends Controller
{
    public function list(Request $request)
    {
        $contents = Content::with('user')->orderBy('date','DESC')->paginate(6);

        return [
            'status' => true,
            'content' => $contents
        ];
    }

    public function add(Request $request)
    {
        
        $data = $request->all();
        $user = $request->user();

        //Validação
        $validate = Validator::make($data, [
            'title' => ['required'],
            'text' => ['required'],
            
        ]);
    
        if ($validate->fails()) {
            return [
                'status' => false, 
                "validacao" => true, 
                "erros" => $validate->errors()
            ];
        }

        //Novo Objeto
        $content = new Content;

        $content->title = $data['title'];
        $content->text = $data['text'];
        $content->image = $data['image'] ? $data['image'] : '#';
        $content->date = date('Y-m-d H:i:s');

        $user->contents()->save($content);

        $contents = Content::with('user')->orderBy('date','DESC')->paginate(6);

        return [
            'status' => true,
            'content' => $contents
        ];
    }
}
