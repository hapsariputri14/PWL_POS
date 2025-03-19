@extends('layouts.app')

@section('subtitle', 'Kategori')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Kategori')

@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">Manage Kategori</div>
            <div class="card-header">
                <a href="/kategori/create">
                    <button class="btn btn-primary">Add</button>
                </a>
            </div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection

@push('js')
    {{ $dataTable->scripts() }}
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        function deleteKategori(id) {
            if (confirm('Apakah Anda yakin ingin menghapus kategori ini?')) {
                $.ajax({
                    url: `/kategori/${id}`,
                    type: 'DELETE',
                    success: function(response) {
                        if (response.success) {
                            // Reload DataTable
                            $('#kategori-table').DataTable().ajax.reload();
                        } else {
                            alert('Gagal menghapus kategori');
                        }
                    },
                    error: function(xhr, status, error) {
                        alert('Error: ' + error);
                    }
                });
            }
        }
    </script>
@endpush

