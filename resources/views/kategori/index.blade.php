@extends('layouts.app')

{{-- Customize layout sections --}}
@section('subtitle', 'Level')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Level')

@section('content')
<div class="container">
    <div class="card">
        <div class="card-header">
            <h5>Manage Level</h5>
        </div>
        <div class="card-body">
            <a href="/level/create_level" class="btn btn-primary mb-3">Add +</a>

            <h3>Data Level Pengguna</h3>
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Kode Level</th>
                        <th>Nama Level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($data as $d)
                    <tr>
                        <td>{{ $d->level_id }}</td>
                        <td>{{ $d->level_kode }}</td>
                        <td>{{ $d->level_nama }}</td>
                        <td>
                            <a href="/level/edit/{{ $d->level_id }}" class="btn btn-sm btn-warning">Edit</a>
                            <a href="/level/delete/{{ $d->level_id }}" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus?')">Delete</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
