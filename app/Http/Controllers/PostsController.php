<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{

    public function __construct() {
        return $this->middleware('auth',['except'=>['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts=Post::orderBy('id','desc')->paginate(5);
        return view('posts.index',['title'=>'Posts','posts'=>$posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create',['title'=>'Create Post']);
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
            'title' => 'required',
            'text' => 'required',
            'cover_img'=>'image|nullable|max:2001'
        ]);
        if($request->hasFile('cover_img')){
            $filenameWithExt=$request->file('cover_img')->getClientOriginalName();
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension=$request->file('cover_img')->getClientOriginalExtension();
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            $path=$request->file('cover_img')->storeAs('public/cover_images',$fileNameToStore);
        } else {
            $fileNameToStore='noimage.jpg';
        }
        $post=new Post();
        $post->title=$request->title;
        $post->text=$request->text;
        $post->user_id=auth()->user()->id;
        $post->cover_img=$fileNameToStore;
        $post->save();

        return redirect('/posts')->with('success','Post Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $post=Post::find($id);
        return view('posts.single',['title'=>$post->title])->with('post',$post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $post=Post::find($id);
        if(auth()->user()->id !==$post->user_id) {
            return redirect('/posts')->with('error','Permission Denied!');
        }
        return view('posts.edit',['title'=>'Edit Post'])->with('post',$post);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required'
        ]);
        if($request->hasFile('cover_img')){
            $filenameWithExt=$request->file('cover_img')->getClientOriginalName();
            $filename=pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension=$request->file('cover_img')->getClientOriginalExtension();
            $fileNameToStore=$filename.'_'.time().'.'.$extension;
            $path=$request->file('cover_img')->storeAs('public/cover_images',$fileNameToStore);
        }
        // $post=new Post();
        $post=Post::find($id);
        $post->title=$request->title;
        $post->text=$request->text;
        if($request->hasFile('cover_img')){
            $post->cover_img=$fileNameToStore;
        }
        $post->save();

        return redirect('/posts')->with('success','Post Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post=Post::find($id);
        if(auth()->user()->id !==$post->user_id) {
            return redirect('/posts')->with('error','Permission Denied!');
        }
        if($post->cover_img !== 'noimage.jpg') {
            Storage::delete('public/cover_images/'.$post->cover_img);
        }
        $post->delete();
        return redirect('/posts')->with('success','Post successfully removed!');
    }
}
