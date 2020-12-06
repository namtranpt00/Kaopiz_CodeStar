<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index($name = "")
    {
        return "homeController" . $name;
    }

    public function task1()
    {
        return view('task1', ['title' => 'Homework_task1']);
    }

    public function task2Form(Request $request)
    {
        if (!isset($request->slug)) {
            return view('task2');
        }
        if (!isset($request->title)) {
            return view('task2');
        }
        if (!isset($request->contents)) {
            return view('task2');
        }
        return view('task2Display')->with(['slug' => $request->slug, 'title' => $request->title, 'content' => $request->contents]);

    }

    public function task2Display(Request $request)
    {
        return view('task2Display');
    }
}
