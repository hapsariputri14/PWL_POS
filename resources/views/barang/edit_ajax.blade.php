<div id="modal-master" class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Data Barang</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @empty($kategori)
        <div class="modal-body">
            <div class="alert alert-danger">
                <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5> Data yang Anda cari tidak ditemukan.
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" data-dismiss="modal" class="btn btn-warning">Tutup</button>
        </div>
        @else
        <form action="{{ url('/barang/'.$barang->barang_id.'/update_ajax') }}" method="POST" id="form-edit">
            @csrf
            @method('PUT')
            <div class="modal-body">
                <div class="form-group">
                    <label>Kategori</label>
                    <select class="form-control" id="kategori_id" name="kategori_id" required>
                        <option value="">- Pilih Kategori -</option>
                        @foreach($kategori as $item)
                        <option value="{{ $item->kategori_id }}" @if($item->kategori_id == $barang->kategori_id) selected @endif>
                            {{ $item->kategori_nama }}
                        </option>
                        @endforeach
                    </select>
                    <small id="error-kategori_id" class="error-text form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Kode Barang</label>
                    <input type="text" class="form-control" id="barang_kode" name="barang_kode" value="{{ $barang->barang_kode }}" required>
                    <small id="error-barang_kode" class="error-text form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Nama Barang</label>
                    <input type="text" class="form-control" id="barang_nama" name="barang_nama" value="{{ $barang->barang_nama }}" required>
                    <small id="error-barang_nama" class="error-text form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Harga Beli</label>
                    <input type="number" class="form-control" id="harga_beli" name="harga_beli" value="{{ $barang->harga_beli }}" required>
                    <small id="error-harga_beli" class="error-text form-text text-danger"></small>
                </div>
                <div class="form-group">
                    <label>Harga Jual</label>
                    <input type="number" class="form-control" id="harga_jual" name="harga_jual" value="{{ $barang->harga_jual }}" required>
                    <small id="error-h  value="{{ $barang->harga_jual }}" required>
                    <small id="error-harga_jual" class="error-text form-text text-danger"></small>
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
                        kategori_id: { required: true },
                        barang_kode: { required: true, maxlength: 20 },
                        barang_nama: { required: true, maxlength: 100 },
                        harga_beli: { required: true, number: true },
                        harga_jual: { required: true, number: true }
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
                                    dataBarang.ajax.reload();
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
                    errorPlacement: function(error, element) {
                        error.addClass('invalid-feedback');
                        element.closest('.form-group').append(error);
                    },
                    highlight: function(element, errorClass, validClass) {
                        $(element).addClass('is-invalid');
                    },
                    unhighlight: function(element, errorClass, validClass) {
                        $(element).removeClass('is-invalid');
                    }
                });
            });
        </script>
        @endempty
    </div>
</div>
