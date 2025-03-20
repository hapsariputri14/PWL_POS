@extends('layouts.app')

@section('subtitle', 'Tambah Kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Create')

@section('content_body')
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Buat kategori baru</h3>
        </div>

        <form method="POST" action="{{ route('kategori.store') }}">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="kategori_kode">Kode Kategori</label>
                    <input type="text" 
                           class="form-control @error('kategori_kode') is-invalid @enderror" 
                           id="kategori_kode" 
                           name="kategori_kode" 
                           value="{{ old('kategori_kode') }}"
                           placeholder="Masukkan kode kategori">
                    @error('kategori_kode')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <label for="kategori_nama">Nama Kategori</label>
                    <input type="text" 
                           class="form-control @error('kategori_nama') is-invalid @enderror" 
                           id="kategori_nama" 
                           name="kategori_nama" 
                           value="{{ old('kategori_nama') }}"
                           placeholder="Masukkan nama kategori">
                    @error('kategori_nama')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Batal</a>
            </div>
        </form>
    </div>
</div>
@endsection
