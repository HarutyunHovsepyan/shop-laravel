@extends('admin.dashboard.main')

@section('content')
<div class="col-md-12">
    <h2>Categories</h2>
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
            @foreach($categories as $category)
            <tr>
                <td>{{ $category->id }}</td>
                <td>{{ $category->name }}</td>
                <td>{{ $category->code }}</td>
                <td>{{ $category->id }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <a class="btn btn-warning" type="button" href="{{ route('categories.edit', $category) }}">Update</a>
                        <form method="POST" action="{{ route('categories.destroy', $category->id) }}">
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
    <a class="btn btn-success" type="button" href="{{ url('admin/dashboard/categories/create') }}">Create Category</a>
</div>
@endsection
