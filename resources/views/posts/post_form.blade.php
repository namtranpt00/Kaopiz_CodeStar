@extends('layouts.admin')
@section('title', 'Create Post')
@section('content')

    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1>Create post</h1>
                <form action="{{route('post_save')}}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group has-error">
                        <label for="slug">Slug <span class="require">*</span> <small>(This field use in url
                                path.)</small></label>
                        <input type="text" class="form-control" name="slug" value="{{old('slug')}}"/>
                        @error('slug')<span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="title">Title <span class="require">*</span></label>
                        <input type="text" class="form-control" name="title" value="{{old('title')}}"/>
                        @error('title')<span class="text-danger">{{ $message }}</span> @enderror
                    </div>

                    <div class="form-group">
                        <label for="description">Description<span class="require">*</span></label>
                        <textarea rows="5" class="form-control" name="description">{{old('description')}}</textarea>
                        @error('description')<span class="text-danger">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label> Categories</label>
                        <select class="form-control" name="select_user">
                            @foreach($users as $user)
                                <option value="{{$user->id}}">
                                    {{$user->name}}
                                </option>
                            @endforeach
                        </select>
                        {{--                    @error('user')<span class="text-danger">{{ $message }}</span> @enderror--}}

                    </div>
                    <div class="form-group">
                        <label> Categories</label>
                        <select multiple class="form-control" name="select[]">
                            @foreach($categories as $cate)
                                <option
                                    value="{{$cate->id}}" {{ old('select') && in_array($cate->id, old('select')) ? 'selected' : '' }}>
                                    {{$cate->category}}
                                </option>
                            @endforeach
                        </select>
                        @error('select')<span class="text-danger">{{ $message }}</span> @enderror

                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlFile1">Post file input</label>
                        <input type="file" class="form-control-file" id="image" name="image">
                    </div>
                    <div class="form-group">
                        <p><span class="require">*</span> - required fields</p>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">
                            Create
                        </button>
                        <button class="btn btn-default">
                            Cancel
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
