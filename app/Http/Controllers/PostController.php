<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{

    public function post_create()
    {
        $categories = DB::table('categories')->get();
        $users = User::query()->get();

        return view('posts.post_form', ['categories' => $categories, 'users' => $users]);
    }

    public function post_list()
    {
        $posts = Post::query()->orderBy('id', 'desc')->paginate(20);
        return view('posts.post_list', ['posts' => $posts]);
    }

    public function post_save(CreatePostRequest $request)
    {
        var_dump($request->all());
        dd($request->all());

        $post = new Post();
        $post->slug = $request->slug;
        $post->title = $request->title;
        $post->description = $request->description;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $file->move('img', $file->getClientOriginalName());
            $post->image = 'img/' . $file->getClientOriginalName();
        }

        $post->user_id = $request->select_user;
        $post->save();
        $post->categories()->attach($request->select);
        return redirect(route('post_list'));
    }

    public function post_delete(Post $post)
    {
        $post->delete();
        return redirect(route('post_list'));
    }

    public function post_edit(Post $post)
    {
        $post_edit = Post::with('categories', 'user')->find($post->id);
//        dd($post_edit->toArray());
        $categories = DB::table('categories')->get();
        $users = User::query()->get();
        return view('posts.post_edit', ['post' => $post_edit, 'categories' => $categories, 'users' => $users]);
    }

    public function post_update(Post $post, Request $request)
    {
        $request->validate([
            'slug' => 'required',
            'title' => 'required',
            'description' => 'required',
//            'user' => 'required',
//            'select' => 'required',
        ]);
        $post->slug = $request->slug;
        $post->title = $request->title;
        $post->description = $request->description;
        if ($request->hasFile('image')) {
            $file = $request->image;
            $file->move('img', $file->getClientOriginalName());
            $post->image = 'img/' . $file->getClientOriginalName();
        }

        $post->user_id = $request->select_user;
        $post->save();

        return redirect(route('post_list'));
    }
}
