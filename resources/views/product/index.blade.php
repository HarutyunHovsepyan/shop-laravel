@extends('admin.dashboard.main')

@section('content')
<div class="col-md-12">
    <h2>Product</h2>
    <table class="table">
        <tbody>
            <tr>
                <th>
                    #ID
                </th>
                <th>
                    Name
                </th>
                <th>
                    Code
                </th>
            </tr>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->code }}</td>
                <td>{{ $product->category->name }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <a class="btn btn-warning" type="button" href="{{ route('product.edit', $product) }}">Update</a>
                        <form method="POST" action="{{ route('product.destroy', $product->id) }}">
                            @csrf
                            @method('DELETE')
                            <input class="btn btn-danger" type="submit" value="Delete">
                        </form>
                    </div>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a class="btn btn-success" type="button" href="{{ url('admin/dashboard/product/create') }}">Create Product</a>
</div>
@endsection
