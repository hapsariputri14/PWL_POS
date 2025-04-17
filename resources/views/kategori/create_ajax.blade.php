<div id="modal-master" class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kategori</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        </div>
        <form action="{{ url('/kategori/ajax') }}" method="POST" id="form-tambah">
        @csrf
        <div class="modal-body">
            <div class="form-group">
                <label>Kode Kategori</label>
                <input type="text" class="form-control" id="kategori_kode" name="kategori_kode" value="" required>
                <small id="error-kategori_kode" class="error-text form-text text-danger"></small>
            </div>
            <div class="form-group">
                <label>Nama Kategori</label>
                <input type="text" class="form-control" id="kategori_nama" name="kategori_nama" value="" required>
                <small id="error-kategori_nama" class="error-text form-text text-danger"></small>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
        </form>
    </div>
</div>
<script>
    $(document).ready(function() {
        $("#form-tambah").validate({
            rules: {
                kategori_kode: {required: true, maxlength: 20},
                kategori_nama: {required: true, maxlength: 100}
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
                            dataKategori.ajax.reload();
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
