<a href="{{ route('kategori.edit', $kategori_id) }}" class="btn btn-primary btn-sm">edit</a>
<form action="{{ route('kategori.destroy', $kategori_id) }}" method="POST" style="display: inline;">
    @csrf
    @method('DELETE')
    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')">delete</button>
</form>

