@extends('admin.dashboard.main')

@section('content')
<div class="col-md-12">
    <h2>user</h2>
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
                    Role
                </th>
            </tr>
            @foreach($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->name }}</td>
                <td>{{ $user->role }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <a class="btn btn-warning" type="button" href="{{ route('user.edit', $user) }}">Update</a>
                        <form method="POST" action="{{ route('user.destroy', $user->id) }}">
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
</div>
@endsection
