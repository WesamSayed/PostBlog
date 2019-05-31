<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    
    public function index(Post $posts)
    {
        $posts = Post::all();
        return view('Admin.Posts.index', compact('posts'));
    }

    
    public function create(Post $posts)
    {
        return view('Admin.Posts.create' , compact('posts'));
    }

    public function store(Request $request , Post $posts)
    {
        $attributes = $request->validate([
            'title'=>'required',
            'body'=>'required',
            'image'=>'image|required'
        ]);

        if($request->hasFile('image')){
            $image = $request->image;
            $image->move('uploads', $image->getClientOriginalName());
        }

        $posts = Post::create([
            'title'=>$request->title,
            'body'=>$request->body,
            'image'=>$request->image->getClientOriginalName(),
        ]);
      
      

        session()->flash('msg','The Product has been Created');

        return redirect('admin/posts/create');
    }

   
    public function show($id)
    {  
        $posts = Post::find($id);                 
        return view('Admin.Posts.details', compact('posts'));
    }

    public function edit($id)
    {
        $posts = Post::find($id);
        return view('Admin.Posts.edit', compact('posts'));
    }

    public function update(Request $request,$id)
    {
        
        $attributes = $request->validate([
            'title'=>'required',
            'body'=>'required',
            'image'=>'image|required'
        ]);
        $posts = Post::find($id);
        if($request->hasFile('image')){
            if(file_exists(public_path('uploads/').$posts->image)){
              unlink(public_path('uploads/').$posts->image);
            } 
            $image = $request->image;
            $image->move('uploads', $image->getClientOriginalName());
            $posts->image =  $request->image->getClientOriginalName();
        }

        $posts->update([
            'title'=>$request->title,
            'body'=>$request->body,
            'image'=>$posts->image
        ]); 
        session()->flash('msg','Your Post Has been Updated');
       
        return redirect('admin/posts');
        
    }

    public function destroy($id)
    {
        // $posts->delete();
        // dd($id);
        Post::where('id',$id)->delete();

        session()->flash('msg','The Post Has been Deleted!!');

        return redirect('admin/posts');
    }
}
