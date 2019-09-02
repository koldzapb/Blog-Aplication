<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::
               orderBy('name', 'asc')
               ->get();
        return view('admin.categories.create', compact('categories'));

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

        return view('admin.categories.create', compact('categories'));
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
        'name' => 'required|unique:categories|max:255',
       // 'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        
        ]);

        if($request->image){ 
           // $imageName = str_slug($request->name).'.'.$request->image->getClientOriginalExtension();
            $imageName = str_slug($request->name).'.jpeg';
            $request->image->move(public_path('img/categories'), $imageName);
        }
       
       
         Category::create($request->all());

         return redirect('/admin/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $categories = Category::
               orderBy('name', 'asc')
               ->get();

        return view('admin.categories.edit', compact(['categories', 'category']));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      /*  $this->validate($request, [
        'name' => 'required|unique:categories|max:255'
        
        ]);*/

        if($request->image){ 
           // $imageName = str_slug($request->name).'.'.$request->image->getClientOriginalExtension();
            $imageName = str_slug($request->name).'.jpeg';
            $request->image->move(public_path('img/categories'), $imageName);
        }
       
        $category = Category::findOrFail($id);
        $category ->update($request->all());
        
         return redirect('/admin/category');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Category::destroy($id);
        return redirect('/admin/category');
    }
}
