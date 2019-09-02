<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
   
   protected $fillable = [
        'name','title' 
    ];

	 
    

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->title = str_slug($model->name);
        });
    }

     public function articles()
    {
       
        return $this->hasMany(Article::class);
    }

}

