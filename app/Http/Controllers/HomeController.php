<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function task1()
    {
        return view('task1', ['title' => 'Homework_task1']);
    }

    public function index(Request $request)
    {

        $search = $request->search;
        $isDate = Carbon::hasFormat($search, 'Y-m-d');
        if($isDate){
            $posts = DB::table('posts')
                ->whereDate('created_at',$search);

        } else {
            $posts = DB::table('posts')
                ->where('title','LIKE','%'. $search .'%')
                ->orWhere('slug','LIKE','%'. $search .'%');
        }
        $posts  =$posts->orderBy('id', 'desc')->paginate(20);



        return view('home', ['posts' => $posts]);
    }

    public function post_create()
    {
        return view('posts.post_form');
    }

    public function post_list()
    {
        $posts = Post::query()->orderBy('id', 'desc')->paginate(20);
        return view('posts.post_list', ['posts' => $posts]);
    }

    public function post_save(Request $request)
    {
        $post = new Post();
        $post->slug = $request->slug;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        return redirect(route('post_list'));

    }

    public function post_delete(Post $post)
    {
        $post->delete();
        return redirect(route('post_list'));
    }

    public function post_edit(Post $post)
    {
        return view('posts.post_edit', ['post' => $post]);
    }

    public function post_update(Post $post, Request $request)
    {
        $post->slug = $request->slug;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->save();
        return redirect(route('post_list'));
    }
}
