@extends('admin.dashboard.main')

@section('content')
<div class="col-md-12">
    <h1>Update User: <b>{{ $user->name }}</b></h1>

    <form action="{{ route('user.changeRole', $user->id) }}" method="POST">
        @csrf
        @method('PUT')
        <select name="role">
            <option value="admin">Admin</option>
            <option value="user">User</option>
        </select>
        <button type="submit">Change Role</button>
    </form>
    <a href="{{ route('user.index') }}" class="btn btn-secondary">Back to Users</a>
    </form>
</div>

@endsection
