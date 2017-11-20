<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comment;

class CommentsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    
    //
    public function add(Request $request){
        $comment = new Comment();
        $comment->route_id =$request->input('route_id');
        $comment->user_id = 'public';         
        $comment->content = $request->input('content');

        $comment->save();
        return redirect('/routes/'.$request->input('route_id'))->with('success', 'Comment added');
    }
}
