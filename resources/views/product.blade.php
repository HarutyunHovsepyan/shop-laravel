@extends('layout.main')

@section('content')


<div class="card">
    <div class="card-body">
        <h2 class="card-title">{{$product->name}}</h2>
        <p class="card-text">{{$product->description}}</p>
        <h3 class="card-text">Price: {{$product->price}}</h3>
        <h3 class="card-text">Category: {{$category}}</h3>
    </div>
</div>

<a href="{{ route('category', ['category' => $category]) }}" class="btn btn-secondary mt-3">Back to Category</a>

@endsection
