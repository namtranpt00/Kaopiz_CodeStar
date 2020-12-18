<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

    <table class="table table-striped">
        <thead>
        <tr>
            <th>STT</th>
            <th>slug</th>
            <th>title</th>
            <th>description</th>
            <th>image</th>
            <th class="text-right text-nowrap">
                <a href="{{route('post_create')}}" class="btn btn-sm btn-success">Thêm mới</a>
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($posts as $post)
            <tr>
                <td>{{$post->id}}</td>
                <td>{{$post->slug}}</td>
                <td>{{$post->title}}</td>
                <td>{{$post->description}}</td>
                <td>
                    <img src="{{$post->image}}" alt="image">
                </td>

                <td class="text-right text-nowrap">
                    <a href="{{route('post_edit', ['post'=>$post->id])}}" class="btn btn-sm btn-primary ">Sửa</a>
                    <a href="{{route('post_delete', ['post'=>$post->id])}}" class="btn btn-sm btn-danger">Xóa</a>

                </td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <div class="clearfix">
        @if($posts->hasMorePages())
            <a class="btn btn-primary float-left" href="{{$posts->previousPageUrl()}}">&larr; Newer Posts </a>
            <a class="btn btn-primary float-right" href="{{$posts->nextPageUrl()}}">Older Posts &rarr;</a>

        @endif
    </div>
</div>

</body>
</html>
