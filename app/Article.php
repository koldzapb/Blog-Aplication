<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $fillable = [
        'name','title' , 'description', 'user_id', 'category_id', 'is_important', 'views', 'editor_choice'
    ];


    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->title = str_slug($model->name);
        });
    }
    public function category()
    {
       return $this->belongsTo(Category::class);
    }
    public function user()
    {
       
        return $this->belongsTo(User::class);
    }

     public function comments()
    {
       
        return $this->hasMany(Comment::class);
    }

}
