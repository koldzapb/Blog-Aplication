<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\User;
use Auth;

class NewsController extends Controller
{
   public function index()
    {
      //$category_articles=[];
              
      $articles = Article::orderBy('id', 'desc')->get();

      $front_news = $articles->where('is_important' , '=', 1)->take(3)->values();
      $editor_choice_news = $articles->where('editor_choice' , '=', 1)->take(4);
      $latest_news = $articles->take(4);
      $category_articles = $articles->keyBy('id')->groupBy('category.title', true);
      $category_articles_important = $articles->where('is_important' , '=', 1)->keyBy('id')->groupBy('category.title', true);
      $most_viewed_news = $articles->sortByDesc('views');
      $categories = Category::all();
       $most_popular_news = Article::withCount(['comments' => function ($query) { $query->where('is_validated', '=', 1); }])->orderBy('comments_count', 'desc')->take(7)->get();
      
        return view('news.index', compact(['latest_news', 'category_articles', 'front_news', 'category_articles_important', 'most_viewed_news', 'most_popular_news', 'categories', 'editor_choice_news']));

    }

    public function showcategory($title)
    { 
      $categories = Category::all();
       $category = Category::where('title' , '=', $title)->first();
      //  $category = Category::findOrFail($id);
        $category_articles =  $category->articles->keyBy('id')->sortByDesc('created_at');
        $latest_news = $category_articles->take(4);
        $important_articles = $category_articles->where('is_important' , '=', 1)->keyBy('id')->take(2);
        $articles = $category_articles->diffKeys($important_articles)->paginate(4); 
        $most_viewed_news = Article::orderBy('views', 'desc')->take(2)->get();

        $most_popular_news = Article::withCount(['comments' => function ($query) { $query->where('is_validated', '=', 1); }])->where('category_id' , '=', $category->id)->orderBy('comments_count', 'desc')->take(7)->get();
        return view('news.category', compact(['category','articles', 'latest_news', 'important_articles', 'most_viewed_news', 'most_popular_news', 'categories']));

    }

    public function showarticle($title,$id)
    {
       
        $article = Article::findOrFail($id);
        $categories = Category::all();

        $article->increment('views');

        $most_viewed_news = Article::orderBy('views', 'desc')->take(2)->get();

        $comments = $article->comments->where('is_validated' , '=', 1)->reverse()->paginate(5);
        
        return view('news.article', compact(['article', 'comments', 'most_viewed_news', 'categories']));

    }

     public function storecomment(Request $request, $id)
    {
       $this->validate($request, [
        'text' => 'required'
         ]);

        $article = Article::findOrFail($id);
        $request['article_id'] = $article->id;
        Auth::user()->comments()->create($request->all());
        
         return back();

    }


}
