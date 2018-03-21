@extends('layouts.app') 

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-sm-6 col-sm-offset-2">
            <h2>Edit Category</h2>
            <hr>
            <form action="/categories/{{$category->id}}/edit" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title">Category Title</label>
                    <input type="text" class="form-control" id="categoryTitle" name="title" value="{{$category->title}}">
                </div>
                <div class="form-group">
                    <label for="content">Category Content</label>
                    <textarea cols="5" class="form-control" type="text" name="content" id="categoryContent" placeholder="{{$category->content}}"></textarea>
                </div>
                
                @if ($category->photos->count() > 0)
                    <img src="{{ asset('storage/'. $category->photos[0]->file_name)}}" alt="..." class="img-thumbnail">    
                @endif

                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" name="photoForCategory" id="photoForCategory">
                    </div>
                </div>
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <button type="submit" class="btn btn-success">Submit</button>
            </form>
        </div>
    </div>
</div>
@endsection

