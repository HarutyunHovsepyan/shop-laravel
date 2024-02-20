@extends('admin.dashboard.main')

@section('content')
<div class="col-md-12">
    <h2>Create Product</h2>
    <form method="POST" enctype="multipart/form-data" action="{{ route('product.store') }}">
        @csrf
        <div>
            <div class="input-group row">
                <label for="name" class="col-sm-2 col-form-label">Name: </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="name" id="name">
                </div>
            </div>
            <br>
            <div class="input-group row">
                <label for="code" class="col-sm-2 col-form-label">Code: </label>
                <div class="col-sm-6">
                    <input type="text" class="form-control" name="code" id="code">
                </div>
            </div>
            <br>
            <div class="input-group row">
                <label for="price" class="col-sm-2 col-form-label">Price: </label>
                <div class="col-sm-6">
                    <input type="number" class="form-control" name="price" id="price">
                </div>
            </div>
            <br>
            <div class="input-group row">
                <label for="description" class="col-sm-2 col-form-label">Description: </label>
                <div class="col-sm-6">
                    <textarea name="description" id="description" cols="72" rows="7"></textarea>
                </div>
            </div>
            <br>
            <div class="form-group">
                <label for="category_id">Category:</label>
                <select name="category_id" id="category_id" class="form-control">
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="input-group row">
                <label for="image" class="col-sm-2 col-form-label">Image: </label>
                <div class="col-sm-10">
                    <label class="btn btn-default btn-file">
                        Загрузить <input type="file" style="display: none;" name="image" id="image">
                    </label>
                </div>
            </div>
            <br>
            <button class="btn btn-success">Add</button>
        </div>
    </form>
</div>
@endsection
