<?php

namespace App\Http\Controllers;

use App\Article;
use App\Category;
use App\User;
use Auth;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $articles = Article::
               orderBy('id', 'desc')
               ->paginate(20);
        return view('admin.article.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::
               orderBy('name', 'asc')
               ->get();

        return view('admin.article.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $this->validate($request, [
        'name' => 'required|unique:articles|max:255',
        'description' => 'required',
      //  'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        
        ]);

        if($request->image){
            $imageName = str_slug($request->name).'.jpeg';
            $request->image->move(public_path('img/articles'), $imageName);
        }
          
        Auth::user()->articles()->create($request->all());
        return redirect('/admin/article');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   
        $article = Article::findOrFail($id);
        $categories = Category::
               orderBy('name', 'asc')
               ->get();

        return view('admin.article.edit', compact(['article','categories']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $this->validate($request, [
        'name' => 'required|unique:categories|max:255'
        
        ]);

        $request['is_important'] = (isset($request['is_important'])) ? 1 : 0;
        $request['editor_choice'] = (isset($request['editor_choice'])) ? 1 : 0;
        if($request->image){ 
           // $imageName = str_slug($request->name).'.'.$request->image->getClientOriginalExtension();
            $imageName = str_slug($request->name).'.jpeg';
            $request->image->move(public_path('img/articles'), $imageName);
        }
        $article = Article::findOrFail($id);
        $article ->update($request->all());

         return redirect('/admin/article');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       Article::destroy($id);
        return redirect('/admin/article');
    }
}
