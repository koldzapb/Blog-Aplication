<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\User;
use Auth;


class CommentController extends Controller
{
   public function index()
    {
      $comments = Comment::
               orderBy('is_validated', 'asc')
               ->orderBy('id', 'desc')
               ->paginate(20);
        return view('admin.comments.index', compact('comments'));

    }

    

    public function update(Request $request)
    {
     
      $comments = $request['comments'];  //here scores is the input array param 

      foreach($comments as $row){
          $comment = Comment::find($row['id']); 
          $comment->is_validated = (isset ($row['is_validated'])) ? $row['is_validated'] : 0; 
          $comment->update(); 
      }
      return back();

    }


}
