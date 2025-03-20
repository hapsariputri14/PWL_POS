@extends('users.template')
@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>CRUD User</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-success" href="{{ route('users.create') }}">Input User</a>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<table class="table table-bordered">
    <tr>
        <th width="20px" class="text-center">User id</th>
        <th width="150px" class="text-center">Level id</th>
        <th width="200px" class="text-center">Username</th>
        <th width="200px" class="text-center">Nama</th>
        <th width="150px" class="text-center">Password</th>
        <th width="280px" class="text-center">Action</th>
    </tr>
    @foreach ($users as $user)
    <tr>
        <td>{{ $user->user_id }}</td>
        <td>{{ $user->level_id }}</td>
        <td>{{ $user->username }}</td>
        <td>{{ $user->nama }}</td>
        <td>{{ $user->password }}</td>
        <td class="text-center">
            <form action="{{ route('users.destroy', $user->user_id) }}" method="POST" class="d-flex gap-1">
                <a class="btn btn-info btn-sm" href="{{ route('users.show', $user->user_id) }}">Show</a>
                <a class="btn btn-primary btn-sm" href="{{ route('users.edit', $user->user_id) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger btn-sm" 
                onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
@endsection