<form action="{{ url('/kategori/import_ajax') }}" method="POST" id="form-import-kategori" enctype="multipart/form-data">
    @csrf
    <div id="modal-master" class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="importKategoriLabel">Import Data Kategori</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Download Template -->
                <div class="form-group">
                    <label>Download Template</label>
                    <a href="{{ asset('template_kategori.xlsx') }}" class="btn btn-info btn-sm" download>
                        <i class="fa fa-file-excel"></i> Download Template
                    </a>
                    <small id="error-kategori_nama" class="error-text form-text text-danger"></small>
                </div>
                <!-- Input File -->
                <div class="form-group">
                    <label>Pilih File</label>
                    <input type="file" name="file_kategori" id="file_kategori" class="form-control" required>
                    <small id="error-file_kategori" class="error-text form-text text-danger"></small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-warning">Batal</button>
                <button type="submit" class="btn btn-primary">Upload</button>
            </div>
        </div>
    </div>
</form>
<script>
$(document).ready(function() {
    $("#form-import-kategori").validate({
        rules: {
            file_kategori: { required: true, extension: "xlsx" }
        },
        submitHandler: function(form) {
            var formData = new FormData(form);
            
            $.ajax({
                url: form.action,
                type: form.method,
                data: formData,
                processData: false, // penting untuk file upload
                contentType: false, // penting untuk file upload
                success: function(response) {
                    if(response.status) {
                        // jika sukses, tutup modal dan tampilkan notifikasi sukses
                        $('#myModal').modal('hide');
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil',
                            text: response.message
                        });
                        // reload atau update data tabel kategori
                        tableKategori.ajax.reload();
                    } else {
                        // jika error, tampilkan pesan di tiap field
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
                }
            });
            return false;
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element) {
            $(element).removeClass('is-invalid');
        }
    });
});
</script>
