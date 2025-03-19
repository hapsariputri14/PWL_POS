<?php

namespace App\Http\Controllers;

use App\DataTables\KategoriDataTable;
use App\Models\KategoriModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class KategoriController extends Controller
{
    public function index(KategoriDataTable $dataTable)
    {
        return $dataTable->render('kategori.index');
    }

    public function create()
    {
        return view('kategori.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kategori_kode' => 'required|unique:m_kategori,kategori_kode',
            'kategori_nama' => 'required',
        ]);

        KategoriModel::create([
            'kategori_kode' => $request->kategori_kode,
            'kategori_nama' => $request->kategori_nama,
        ]);

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil ditambahkan');
    }

    public function edit($id)
    {
        $kategori = KategoriModel::find($id);
        return view('kategori.edit', compact('kategori'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kategori_kode' => 'required|unique:m_kategori,kategori_kode,'.$id.',kategori_id',
            'kategori_nama' => 'required',
        ]);

        $kategori = KategoriModel::find($id);
        $kategori->update($request->all());

        return redirect()->route('kategori.index')
            ->with('success', 'Kategori berhasil diupdate.');
    }
    
    public function destroy($id)
    {
        try {
            $kategori = KategoriModel::find($id);
            
            if (!$kategori) {
                return redirect()->route('kategori.index')
                    ->with('error', 'Kategori tidak ditemukan');
            }

            $kategori->delete();

            return redirect()->route('kategori.index')
                ->with('success', 'Kategori berhasil dihapus');

        } catch (\Exception $e) {
            Log::error('Error deleting kategori: ' . $e->getMessage());
            return redirect()->route('kategori.index')
                ->with('error', 'Terjadi kesalahan saat menghapus kategori');
        }
    }
}

