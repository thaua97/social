<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //
    protected $fillable = [
        'content_id', 'text', 'date'
    ];

   /** 
     * Relacionamentos entre tabelas
     * 
     * */
   public function user()
   {
       return $this->belongsTo('App\User');
   }

   public function content()
   {
       return $this->belongsTo('App\Content');
   }
   
}
