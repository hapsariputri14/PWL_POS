@extends('layouts.template')
@section('content')
<div class="card card-outline card-primary">
    <div class="card-header">
        <h3 class="card-title">{{ $page->title }}</h3>
        <div class="card-tools"></div>
    </div>
    <div class="card-body"> 
        @empty($supplier)
        <div class="alert alert-danger alert-dismissible">
            <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> Data yang Anda cari tidak ditemukan.
        </div>
        <a href="{{ url('supplier') }}" class="btn btn-sm btn-default mt-2">Kembali</a> 
        @else
        <form method="POST" action="{{ url('/supplier/'.$supplier->supplier_id) }}" class="form-horizontal">
            @csrf
            {!! method_field('PUT') !!}
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Nama Supplier</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="supplier_nama" name="supplier_nama" value="{{ old('supplier_nama', $supplier->supplier_nama) }}" required>
                    @error('supplier_nama')
                    <small class="form-text text-danger">{{ $message }}</small> 
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Alamat</label>
                <div class="col-10">
                    <textarea class="form-control" id="supplier_alamat" name="supplier_alamat" required>{{ old('supplier_alamat', $supplier->supplier_alamat) }}</textarea>
                    @error('supplier_alamat')
                    <small class="form-text text-danger">{{ $message }}</small> 
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label">Telepon</label>
                <div class="col-10">
                    <input type="text" class="form-control" id="supplier_telp" name="supplier_telp" value="{{ old('supplier_telp', $supplier->supplier_telp) }}" required>
                    @error('supplier_telp')
                    <small class="form-text text-danger">{{ $message }}</small> 
                    @enderror
                </div>
            </div>
            <div class="form-group row">
                <label class="col-2 control-label col-form-label"></label>
                <div class="col-10">
                    <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                    <a class="btn btn-sm btn-default ml-1" href="{{ url('supplier') }}">Kembali</a>
                </div>
            </div>
        </form> 
        @endempty
    </div>
</div> 
@endsection
@push('css') 
@endpush 
@push('js') 
@endpush
