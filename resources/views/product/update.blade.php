@extends('admin.dashboard.main')

@section('content')
<div class="col-md-12">
    <h1>Update Product: <b>{{ $product->name }}</b></h1>

    <form method="POST" enctype="multipart/form-data" action="{{ route('product.update', ['id' => $product->id]) }}">
        @csrf
        <div class="form-group">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" id="name" value="{{ $product->name }}" required autofocus>
        </div>

        <div class="form-group">
            <label for="code">Code:</label>
            <input type="text" class="form-control" name="code" id="code" value="{{ $product->code }}" required>
        </div>

        <div class="form-group">
            <label for="price">Price:</label>
            <input type="text" class="form-control" name="price" id="price" value="{{ $product->price }}" required>
        </div>

        <div class="form-group">
            <label for="description">Description:</label>
            <textarea class="form-control" name="description" id="description" rows="5">{{ $product->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="category_id">Category:</label>
            <select name="category_id" id="category_id" class="form-control">
                @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="image">Image:</label>
            <input type="file" class="form-control-file" name="image" id="image">
        </div>

        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('product.index') }}" class="btn btn-secondary">Back to Products</a>
    </form>
</div>

@endsection
