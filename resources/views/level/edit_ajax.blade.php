<div id="modal-master" class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data Level</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        @empty($level)
        <div class="modal-body">
            <div class="alert alert-danger">
                <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> Data yang Anda cari tidak ditemukan.
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-warning">Tutup</button>
        </div>
        @else
        <form action="{{ url('/level/'.$level->level_id.'/update_ajax') }}" method="POST" id="form-edit">
        @csrf
        @method('PUT')
        <div class="modal-body">
            <div class="form-group">
                <label>Kode Level</label>
                <input type="text" class="form-control" id="level_kode" name="level_kode" value="{{ $level->level_kode }}" required>
                <small id="error-level_kode" class="error-text form-text text-danger"></small>
            </div>
            <div class="form-group">
                <label>Nama Level</label>
                <input type="text" class="form-control" id="level_nama" name="level_nama" value="{{ $level->level_nama }}" required>
                <small id="error-level_nama" class="error-text form-text text-danger"></small>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
        <script>
            $(document).ready(function() {
                $("#form-edit").validate({
                    rules: {
                        level_kode: {required: true, maxlength: 20},
                        level_nama: {required: true, maxlength: 100}
                    },
                    submitHandler: function(form) {
                        $.ajax({
                            url: form.action,
                            type: form.method,
                            data: $(form).serialize(),
                            success: function(response) {
                                if(response.status){
                                    $('#myModal').modal('hide');
                                    Swal.fire({
                                        icon: 'success',
                                        title: 'Berhasil',
                                        text: response.message
                                    });
                                    dataLevel.ajax.reload();
                                } else {
                                    $('.error-text').text('');
                                    $.each(response.msgField, function(prefix, val) {
                                        $('#error-'+prefix).text(val[0]);
                                    });
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Terjadi Kesalahan',
                                        text: response.message
                                    });
                                }
                            }
                        });
                        return false;
                    },
                    errorElement: 'span',
                    errorPlacement: function (error, element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight: function (element, errorClass, validClass) {
                        $(element).addClass('is-invalid');
                    },
                    unhighlight: function (element, errorClass, validClass) {
                        $(element).removeClass('is-invalid');
                    }
                });
            });
        </script>
        @endempty
    </div>
</div>
