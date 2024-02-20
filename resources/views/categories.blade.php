@extends('layout.main')

@section('content')
@foreach($categories as $category)
<div class="container">
    <div class="row justify-content-center">
        <div class="panel">
            <a href="/{{$category->code}}">
                <!-- <img src="{{ Storage::url($category->image) }}"> -->
                <h2>{{ $category->name }}</h2>
            </a>
            <p>
                {{ $category->description }}
            </p>
        </div>
    </div>
</div>
 @endforeach

 @endsection
