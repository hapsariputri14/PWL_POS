@extends('users.template')
@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-12 margin-tb">
        <div class="float-left">
            <h2>Edit User</h2>
        </div>
        <div class="float-right">
            <a class="btn btn-secondary" href="{{ route('users.index') }}">Kembali</a>
        </div>
    </div>
</div>

@if ($errors->any())
<div class="alert alert-danger">
    <strong>Ops!</strong> Error <br><br>
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

<form action="{{ route('users.update', $user->user_id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Level ID:</strong>
                <input type="text" name="level_id" value="{{ $user->level_id }}" 
                class="form-control" placeholder="Masukkan level">
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Username:</strong>
                <input type="text" value="{{ $user->username }}" 
                class="form-control" name="username" placeholder="Masukkan username">
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nama:</strong>
                <input type="text" value="{{ $user->nama }}" name="nama" 
                class="form-control" placeholder="Masukkan nama">
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Password:</strong>
                <input type="password" value="{{ $user->password }}" name="password" 
                class="form-control" placeholder="Masukkan password">
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>
@endsection