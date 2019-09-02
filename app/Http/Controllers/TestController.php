<?php

namespace App\Http\Controllers;

use App\Comment;
use Illuminate\Http\Request;
use App\Article;
use App\Category;
use App\User;
use Auth;


class TestController extends Controller
{
   public function index()
    {
      $comments = Comment::
               orderBy('id', 'desc')
               ->get();
        return view('admin.comments.index', compact('comments'));

    }

    

    public function update(Request $request)
    {
      /*
      foreach ($getEx as $valueCheck) {
        $trashSent = Message::where('mid', '=', $valueCheck)->update(array('msg_status' => 2));
                  return Response::json(array('message' => 'successfully'));
                    }*/
      $comments = $request['comments'];  //here scores is the input array param 

      foreach($comments as $row){
          $comment = Comment::find($row['id']); 
          $comment->is_validated = (isset ($row['is_validated'])) ? $row['is_validated'] : 0; 
          $comment->update(); 
      }
      return back();

    }


}
