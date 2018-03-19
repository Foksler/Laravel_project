@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <h2 class="text-left">Products</h2>
        <hr>
        <p class="text-right">
            <a href="https://project.test/products/create" class="btn btn-success">Add New Product</a>
        </p>
    </div>
    <hr>

    <div class="card-body">
        @if (session('status'))
            <div class="alert alert-success">
                {{ session('status') }}
            </div>
        @endif
    <div>

    <div class="row justify-content-center">

        @foreach ($products as $product)

            <div class="card" style="width: 15rem;">
                <div class="card-body">
                    <h5 class="card-title"><a href="/products/{{$product->id}}">Title : {{$product->title}}</a></h5>
                    <p class="card-text">Manufacturer : {{$product->manufacturer}}</p>
                    <p class="card-text">Description : {{$product->description}}</p>
                    <p class="card-text">Size : {{$product->size}} cm</p>
                    <p class="card-text">Material : {{$product->material}}</p>
                    <p class="card-text">Price : {{$product->price}} EUR</p>

                    <a href="{{ URL::to('products/' . $product->id . '/edit') }}">
                    <button type="button" class="btn btn-warning">Edit</button>
                    </a>&nbsp;
                    <form action="{{url('products', [$product->id])}}" method="POST">
                    <input type="hidden" name="_method" value="DELETE">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <input type="submit" class="btn btn-danger" value="Delete"/>
                    </form>
                </div>
            </div>

        @endforeach

    </div>
</div>
@endsection
