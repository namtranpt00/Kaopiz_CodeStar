<!DOCTYPE html>
<html lang="en">
<head>
    <title>Bootstrap Example</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container">
    <h2>Form task 2</h2>
    <form action="{{route('homework.task2Form')}}">
        <div class="form-group">
            <label >Slug</label>
            <input type="text" class="form-control" placeholder="Enter slug" name="slug">
        </div>
        <div class="title">
            <label >Title</label>
            <input type="text" class="form-control" placeholder="Enter title" name="title">
        </div>
        <div class="title">
            <label >Content</label>
            <input type="textarea" class="form-control" placeholder="Enter content" name="contents">
        </div>
        <button type="submit" class="btn btn-primary mt-4">Submit</button>
    </form>
</div>

</body>
</html>
