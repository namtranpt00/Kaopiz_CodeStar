<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatePostRequest;
use App\Models\Post;
use App\Models\User;
use App\Rules\FooRule;
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
        if ($isDate) {
            $posts = DB::table('posts')
                ->whereDate('created_at', $search);
        } else {
            $posts = DB::table('posts')
                ->where('title', 'LIKE', '%' . $search . '%')
                ->orWhere('slug', 'LIKE', '%' . $search . '%');
        }
        $posts = $posts->orderBy('id', 'desc')->paginate(20);
        return view('user.home', ['posts' => $posts]);
    }

}
