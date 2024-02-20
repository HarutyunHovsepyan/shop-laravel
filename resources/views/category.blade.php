@extends('layout.main')
@section('content')
    <h2>{{ optional($category)->name }}</h2>
    <p>
        {{ optional($category)->description }}
    </p>
    <div class="row">
        @foreach($category->products as $product)
        @include('layout.card',compact('product'))
        @endforeach
    </div>
@endsection
