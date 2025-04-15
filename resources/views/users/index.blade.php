@extends('layouts.admin')

@section('title', 'Manajemen User')

@section('page_title', 'Daftar User')

@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data User</h3>
        <div class="card-tools">
            <a href="{{ route('users.create') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus"></i> Tambah User
            </a>
        </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Sukses!</h5>
            {{ $message }}
        </div>
        @endif

        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th style="width: 50px" class="text-center">ID</th>
                    <th>Level</th>
                    <th>Username</th>
                    <th>Nama</th>
                    <th style="width: 150px">Password</th>
                    <th style="width: 200px" class="text-center">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td class="text-center">{{ $user->user_id }}</td>
                    <td>{{ $user->level->level_nama ?? 'Tidak ada level' }}</td>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->nama }}</td>
                    <td>{{ $user->password }}</td>
                    <td class="text-center">
                        <form action="{{ route('users.destroy', $user->user_id) }}" method="POST">
                            <a class="btn btn-info btn-sm" href="{{ route('users.show', $user->user_id) }}">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a class="btn btn-primary btn-sm" href="{{ route('users.edit', $user->user_id) }}">
                                <i class="fas fa-edit"></i>
                            </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@endsection