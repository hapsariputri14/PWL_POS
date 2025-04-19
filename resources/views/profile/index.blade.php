@extends('layouts.template')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Kolom Profil -->
        <div class="col-md-4">
            <!-- Kartu Profil -->
            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">
                        <i class="fas fa-user mr-1"></i> Profil Pengguna
                    </h3>
                </div>
                <div class="card-body box-profile">
                    <div class="text-center position-relative mb-4">
                        <img class="profile-user-img img-fluid img-circle" 
                             src="{{ Auth::user()->photo ? asset('storage/profile_photos/' . Auth::user()->photo) : asset('adminlte/dist/img/user2-160x160.jpg') }}" 
                             alt="User profile picture" 
                             id="profile-image"
                             style="width: 150px; height: 150px; object-fit: cover; border: 3px solid #007bff; box-shadow: 0 3px 6px rgba(0,0,0,0.16);">
                        
                        <div class="profile-change-overlay">
                            <button type="button" id="change-photo-btn" class="btn btn-sm btn-info rounded-circle position-absolute" style="bottom: 0; right: 50%; transform: translateX(75px);">
                                <i class="fas fa-camera"></i>
                            </button>
                        </div>
                    </div>

                    <h3 class="profile-username text-center">{{ Auth::user()->nama }}</h3>
                    <p class="text-muted text-center">
                        <span class="badge badge-primary">{{ Auth::user()->level->level_nama }}</span>
                    </p>

                    <form id="photo-form" enctype="multipart/form-data" class="d-none">
                        @csrf
                        <div class="form-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="photo" name="photo" accept="image/jpeg,image/png,image/jpg">
                                <label class="custom-file-label" for="photo">Pilih foto</label>
                            </div>
                            <small id="error-photo" class="error-text form-text text-danger"></small>
                        </div>
                    </form>

                    <button type="button" class="btn btn-primary btn-block" id="update-photo-btn">
                        <i class="fas fa-camera mr-1"></i> Perbarui Foto
                    </button>
                </div>
            </div>
        </div>

        <!-- Kolom Informasi -->
        <div class="col-md-8">
            <!-- Kartu Informasi Pengguna -->
            <div class="card card-primary card-outline card-tabs">
                <div class="card-header p-0 pt-1 border-bottom-0">
                    <ul class="nav nav-tabs" id="profile-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="info-tab" data-toggle="pill" href="#info" role="tab" aria-controls="info" aria-selected="true">
                                <i class="fas fa-info-circle mr-1"></i> Informasi
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-content" id="profile-tabContent">
                        <!-- Tab Informasi -->
                        <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
                            <div class="row">
                                <div class="col-12">
                                    <h4><i class="fas fa-user-circle mr-2"></i>Informasi Pengguna</h4>
                                    <hr>
                                </div>
                            </div>
                            
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <tr>
                                        <th style="width: 30%">Username</th>
                                        <td>{{ Auth::user()->username }}</td>
                                    </tr>
                                    <tr>
                                        <th>Nama Lengkap</th>
                                        <td>{{ Auth::user()->nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>Level Pengguna</th>
                                        <td>{{ Auth::user()->level->level_nama }}</td>
                                    </tr>
                                    <tr>
                                        <th>Tanggal Bergabung</th>
                                        <td>{{ Auth::user()->created_at ? \Carbon\Carbon::parse(Auth::user()->created_at)->format('d M Y') : 'Tidak tersedia' }}</td>
                                    </tr>
                                </table>
                            </div>
                            
                            <div class="mt-4">
                                <div class="callout callout-info">
                                    <h5><i class="fas fa-info-circle"></i> Informasi:</h5>
                                    <p>Halaman ini menampilkan informasi profil Anda. Untuk mengubah foto profil, gunakan tombol "Perbarui Foto" di panel sebelah kiri.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Preview Foto -->
<div class="modal fade" id="previewPhotoModal" tabindex="-1" role="dialog" aria-labelledby="previewPhotoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="previewPhotoModalLabel">Preview Foto Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body text-center">
                <img id="preview-image" src="{{ Auth::user()->photo ? asset('storage/profile_photos/' . Auth::user()->photo) : asset('adminlte/dist/img/user2-160x160.jpg') }}" 
                     class="img-fluid rounded" style="max-height: 300px;">
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                <button type="button" class="btn btn-primary" id="confirm-update-photo">Perbarui Foto</button>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css')
<style>
    .profile-change-overlay {
        position: relative;
    }
    
    .profile-user-img {
        transition: all 0.3s ease;
    }
    
    .profile-user-img:hover {
        transform: scale(1.05);
    }
    
    #change-photo-btn {
        transition: all 0.3s ease;
    }
    
    #change-photo-btn:hover {
        transform: scale(1.1);
    }
    
    .nav-tabs .nav-link.active {
        font-weight: bold;
    }
    
    .table th {
        background-color: #f8f9fa;
    }
</style>
@endpush

@push('js')
<script>
$(document).ready(function() {
    // Menampilkan nama file yang dipilih
    $('#photo').on('change', function() {
        var fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').html(fileName);
        
        // Preview gambar yang dipilih
        if (this.files && this.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#profile-image').attr('src', e.target.result);
                $('#preview-image').attr('src', e.target.result);
                $('#previewPhotoModal').modal('show');
            }
            reader.readAsDataURL(this.files[0]);
        }
    });
    
    // Tombol untuk memilih foto
    $('#change-photo-btn, #update-photo-btn').on('click', function() {
        $('#photo').click();
    });
    
    // Konfirmasi update foto
    $('#confirm-update-photo').on('click', function() {
        var formData = new FormData($('#photo-form')[0]);
        
        $.ajax({
            url: "{{ route('profile.update-photo') }}",
            type: "POST",
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {
                $('#confirm-update-photo').html('<i class="fas fa-spinner fa-spin"></i> Memproses...');
                $('#confirm-update-photo').attr('disabled', true);
            },
            success: function(response) {
                if (response.status) {
                    $('#previewPhotoModal').modal('hide');
                    
                    Swal.fire({
                        icon: 'success',
                        title: 'Berhasil',
                        text: response.message,
                        showConfirmButton: false,
                        timer: 1500
                    });
                    
                    // Update foto di sidebar
                    $('.user-panel .image img').attr('src', response.photo_url);
                    
                } else {
                    $('.error-text').text('');
                    $.each(response.msgField, function(prefix, val) {
                        $('#error-' + prefix).text(val[0]);
                    });
                    
                    Swal.fire({
                        icon: 'error',
                        title: 'Terjadi Kesalahan',
                        text: response.message
                    });
                }
                
                $('#confirm-update-photo').html('Perbarui Foto');
                $('#confirm-update-photo').attr('disabled', false);
            },
            error: function(xhr) {
                Swal.fire({
                    icon: 'error',
                    title: 'Terjadi Kesalahan',
                    text: 'Gagal mengunggah foto'
                });
                
                $('#confirm-update-photo').html('Perbarui Foto');
                $('#confirm-update-photo').attr('disabled', false);
            }
        });
    });
});
</script>
@endpush
