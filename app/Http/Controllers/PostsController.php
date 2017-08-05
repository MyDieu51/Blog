<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;

class PostsController extends Controller
{
    public function index()
    {
        $posts = Post::all();
        $id=1;
        if (\Illuminate\Support\Facades\Auth::guest()) {
            return view('blog.index', compact('posts'));
        }
        else {
            return view('blog.table', compact('posts', 'id'));
        }
    }
    public function show($id)
    {
        $post = Post::where('id', $id)->first();
        return view('blog.show', compact('post'));
    }
    public function create()
    {
        return view('blog.create');
    }
    public function store(Request $request)
    {
        // Validation::make()
        $this->validate($request, [
            'title' => 'required|min:3',
            'content' => 'required',
            'user_id' => 'numeric'
        ]);
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = \Illuminate\Support\Facades\Auth::id();
        $post->save();
        \Session::flash('flash_message', '<b>Well done</b> You added new post successfully');

        return redirect('/');
    }
    public function edit($id)
    {
        $post = Post::where('id', $id)->first();
        return view('blog.edit', compact('post'));
    }
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = \Illuminate\Support\Facades\Auth::id();
        $post->save();
        return redirect('/');
    }
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();
        \Session::flash('flash_message', '<b>Well done</b> You deleted post ' . $post->title . 'successfully');
        return redirect('/');
    }
}
