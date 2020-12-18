@extends('layouts.user')
@section('title', 'Home Page')
@section('content')

    <div class="container">
        <div class=" d-flex justify-content-end">
            <form action="{{route('home')}}" method="get">
                <input type="text" class="form-control" placeholder="Search" name="search"/>
            </form>
        </div>
        <div class="row">
            <div class="col-lg-8 col-md-10 mx-auto">
                @foreach($posts as $post)
                    <div class="post-preview">
                        <a href="{{$post->slug}}">
                            <h2 class="post-title">
                                {{$post->title}}
                            </h2>
                            <h3 class="post-subtitle">

                                {{ substr($post->description, 0,50) }}
                            </h3>
                        </a>
                        <p class="post-meta">Posted by
                            <a href="#">{{$post->slug}}</a>
                            {{$post->created_at}}</p>
                    </div>
                @endforeach

                <hr>
                <!-- Pager -->
                <div class="clearfix">
                    @if($posts->hasMorePages())
                        <a class="btn btn-primary float-left" href="{{$posts->previousPageUrl()}}">&larr; Newer Posts </a>
                        <a class="btn btn-primary float-right" href="{{$posts->nextPageUrl()}}">Older Posts &rarr;</a>

                    @endif
                </div>
            </div>
        </div>
    </div>

    <hr>
@endsection
