@extends('layout.main')
@section('content')

<div class="container">
    <h2>All Products</h2>
    <div class="row justify-content-center">
        @foreach($products as $product)
        @include('layout.card',compact('product'))
        @endforeach
    </div>
</div>
@endsection
