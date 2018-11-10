<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use App\Post;

use Illuminate\Support\Facades\Storage;

class PostsController extends Controller
{

    public function __construct()
    {
        return $this->middleware('auth', ['except' => ['index', 'show', 'search']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function index(Post $post)
    {
        $posts = $post->orderBy('id','desc')->paginate(5);
        return view('posts.index')
                  ->with('title', 'Posts')
                  ->with('posts', $posts);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create')
                  ->with('title', 'Create Post');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Post $post
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Post $post)
    {
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required',
            'cover_img'=>'image|nullable|max:2001'
        ]);

        if($request->hasFile('cover_img')) {
            $filenameWithExt = $request->file('cover_img')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('cover_img')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_img')->storeAs('public/cover_images',$fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        $post->title = $request->title;
        $post->text = $request->text;
        $post->user_id = auth()->user()->id;
        $post->cover_img = $fileNameToStore;
        $post->save();

        return redirect('/posts')
                      ->with('success', 'Post Created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        $post = new Post;
        $content = $post->findOrFail($id);
        return view('posts.single')
                  ->with('title', $content->title)
                  ->with('post', $content);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $id)
    {
        $post = new Post;
        $content = $post->find($id);
        if(auth()->user()->id !== $content ->user_id) {
            return redirect('/posts')->with('error','Permission Denied!');
        }
        return view('posts.edit')
                  ->with('title', 'Edit Post')
                  ->with('post',$content );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param \App\Post $post
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post, int $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'text' => 'required'
        ]);
        if($request->hasFile('cover_img')){
            $filenameWithExt = $request->file('cover_img')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            $extension = $request->file('cover_img')->getClientOriginalExtension();
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            $path = $request->file('cover_img')->storeAs('public/cover_images',$fileNameToStore);
        }
        // $post=new Post();
        $content = $post->find($id);
        $content->title = $request->title;
        $content->text = $request->text;
        if($request->hasFile('cover_img')){
            $content->cover_img = $fileNameToStore;
        }
        $content->save();

        return redirect('/posts')
                      ->with('success','Post Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        $post = new Post;
        $postToDelete = $post->find($id);
        if(auth()->user()->id !== $postToDelete->user_id) {
            return redirect('/posts')->with('error','Permission Denied!');
        }
        if($postToDelete->cover_img !== 'noimage.jpg') {
            Storage::delete('public/cover_images/' . $postToDelete->cover_img);
        }
        $postToDelete->delete();
        return redirect('/posts')
                      ->with('success','Post successfully removed!');
    }

    public function search(Request $request, Post $post)
    {
      $query = $request->search;
      if (!empty($query)) {
          $query = '%' . $query . '%';
          $posts = $post->where('title', 'like', $query)->orWhere('text', 'like', $query)->latest()->get();
          return view('search.index')
                    ->with('posts', $posts)
                    ->with('query', $request->search)
                    ->with('title', 'Searching ' . $request->search);
        } else {
            return view('search.error')
                      ->with('title', 'Empty request')
                      ->with('message', 'Your search request is empty!');
        }
    }
}
