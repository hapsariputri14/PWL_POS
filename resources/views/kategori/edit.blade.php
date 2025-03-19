@extends('layouts.app')

@section('subtitle', 'Edit Kategori')
@section('content_header_title', 'Kategori')
@section('content_header_subtitle', 'Edit')

@section('content_body')
    <div class="container">
        <div class="card">
            <div class="card-header">Edit Kategori</div>
            <div class="card-body">
                <form action="{{ route('kategori.update', $kategori->kategori_id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="kategori_kode">Kode Kategori</label>
                        <input type="text" class="form-control @error('kategori_kode') is-invalid @enderror" 
                               id="kategori_kode" name="kategori_kode" value="{{ old('kategori_kode', $kategori->kategori_kode) }}">
                        @error('kategori_kode')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="kategori_nama">Nama Kategori</label>
                        <input type="text" class="form-control @error('kategori_nama') is-invalid @enderror" 
                               id="kategori_nama" name="kategori_nama" value="{{ old('kategori_nama', $kategori->kategori_nama) }}">
                        @error('kategori_nama')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                    <a href="{{ route('kategori.index') }}" class="btn btn-secondary">Batal</a>
                </form>
            </div>
        </div>
    </div>
@stop

