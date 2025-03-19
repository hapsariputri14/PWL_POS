<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class BarangModel extends Model
{
    protected $table = 'm_barang'; // Sesuaikan dengan nama tabel di database
    protected $primaryKey = 'barang_id';
    
    protected $fillable = ['barang_kode', 'barang_nama', 'kategori_id']; // Sesuaikan dengan kolom yang ada

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriModel::class, 'kategori_id', 'kategori_id');
    }
}
