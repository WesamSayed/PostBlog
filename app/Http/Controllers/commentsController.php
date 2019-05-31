<?php

namespace App\Http\Controllers;

use App\Post;
use App\Comment;
use Illuminate\Http\Request;
use Response;
class CommentsController extends Controller
{
    public function store(Request $request) {
// return $request->all();
        $this->validate(request(),['body' => 'required|min:2']);
        $comment= Comment::create([
            'body' => $request->body,
            'post_id' => $request->post, 
            'user_id' =>$request->user_id 
        ]);
        $user = $comment->user->name;
        $comment->user = $user;
        $comment->created= $comment->created_at->diffForHumans();
        // $comment->created_at = $comment->created_at->diffForHumans();
		return Response::json($comment);
    }
}
