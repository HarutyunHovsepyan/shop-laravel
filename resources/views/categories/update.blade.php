@extends('admin.dashboard.main')

@section('content')
<div class="col-md-12">
    <h1>Update Category: <b>{{ $category->name }}</b></h1>

    <form method="POST" enctype="multipart/form-data" action="{{ route('categories.update', ['id' => $category->id]) }}">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="code">Code:</label>
            <input type="text" class="form-control" name="code" id="code" value="{{ $category->code }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" name="description" id="description" rows="5">{{ $category->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control-file" name="image" id="image">
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to Categories</a>
    </form>
</div>

@endsection
