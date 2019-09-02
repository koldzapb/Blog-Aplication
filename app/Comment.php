<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
       'text', 'user_id', 'article_id', 'is_validated'
    ];


    public function user()
    {
       
        return $this->belongsTo(User::class);
    }

    public function article()
    {
       
        return $this->belongsTo(Article::class);
    }

}
