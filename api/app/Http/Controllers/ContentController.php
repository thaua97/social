<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Content;

class ContentController extends Controller
{
    public function list(Request $request)
    {
        $contents = Content::with('user')->orderBy('date','DESC')->paginate(6);
        $user = $request->user();

        foreach ($contents as $key => $content) {
            $content->total_likes = $content->likes()->count();
            $content->comments = $content->comments()->with('user')->orderBy('date','DESC')->get();
            $liked = $user->likes()->find($content->id);
            if($liked){
                $content->content_like = true;
            } else {
                $content->content_like = false;
            }
        }

        return [
            'status' => true,
            'content' => $contents,
            'master' => $pageMaster
        ];
    }

    public function page($id, Request $request)
    {
        $pageMaster = User::find($id);
        
        if ($pageMaster) {
            $contents = $pageMaster->contents()->with('user')->orderBy('date','DESC')->paginate(6);
            $user = $request->user();
    
            foreach ($contents as $key => $content) {
                $content->total_likes = $content->likes()->count();
                $content->comments = $content->comments()->with('user')->orderBy('date','DESC')->get();
                $liked = $user->likes()->find($content->id);
                if($liked){
                    $content->content_like = true;
                } else {
                    $content->content_like = false;
                }
            }
        
            return [
                'status' => true,
                'content' => $contents
            ];
        } else {
           return [
               'status' => false,
               'erro' => 'Usuário não existe!'
           ];
        }
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

    public function like($id, Request $request)
    {
        $content = Content::find($id);
        if ($content) {
            $user = $request->user();
            $user->likes()->toggle($content->id);
            //return $content->likes()->count();
            //return $content->likes;
            return [
                'status' => true,
                'likes' => $content->likes()->count(),
                'list' => $this->list($request)
            ];
        } else {
            return [
                'status' => false,
                'error' => 'Conteúdo não existe!'
            ];
        }
        
    }

    public function comment($id, Request $request)
    {
        $content = Content::find($id);
        if ($content) {
            $user = $request->user();
            
            $user->comments()->create([
                'content_id' => $content->id,
                'text' => $request->text,
                'date' =>  date('Y-m-d H:i:s'),
            ]);

            return [
                'status' => true,
                'list' => $this->list($request)
            ];

        } else {
            return [
                'status' => false,
                'error' => 'Conteúdo não existe!'
            ];
        }
    }
}
