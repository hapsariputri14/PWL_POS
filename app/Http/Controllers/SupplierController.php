<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SupplierModel;
use Yajra\DataTables\Facades\DataTables;

class SupplierController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Supplier',
            'list' => ['Home', 'Supplier']
        ];

        $page = (object) [
            'title' => 'Daftar Supplier'
        ];

        return view('supplier.index', ['breadcrumb' => $breadcrumb, 'page' => $page]);
    }

    public function list(Request $request)
    {
        $supplier = SupplierModel::select('supplier_id', 'supplier_nama', 'supplier_alamat', 'supplier_telp');

        return DataTables::of($supplier)
            ->addIndexColumn()
            ->addColumn('aksi', function ($supplier) {
                $btn = '<a href="'.url('/supplier/' . $supplier->supplier_id).'" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="'.url('/supplier/' . $supplier->supplier_id . '/edit').'" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="'. url('/supplier/'.$supplier->supplier_id).'">'
                        . csrf_field() . method_field('DELETE') .  
                        '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Supplier',
            'list' => ['Home', 'Supplier', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah Supplier'
        ];

        return view('supplier.create', ['breadcrumb' => $breadcrumb, 'page' => $page]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_nama' => 'required',
            'supplier_alamat' => 'required',
            'supplier_telp' => 'required',
        ]);

        SupplierModel::create([
            'supplier_nama' => $request->supplier_nama,
            'supplier_alamat' => $request->supplier_alamat,
            'supplier_telp' => $request->supplier_telp,
        ]);

        return redirect('/supplier')->with('success', 'Data supplier berhasil disimpan');
    }

    public function show($id)
    {
        $breadcrumb = (object) [
            'title' => 'Detail Supplier',
            'list' => ['Home', 'Supplier', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail Supplier'
        ];

        $supplier = SupplierModel::find($id);

        return view('supplier.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'supplier' => $supplier]);
    }

    public function edit($id)
    {
        $breadcrumb = (object) [
            'title' => 'Edit Supplier',
            'list' => ['Home', 'Supplier', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit Supplier'
        ];

        $supplier = SupplierModel::find($id);

        return view('supplier.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'supplier' => $supplier]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'supplier_nama' => 'required',
            'supplier_alamat' => 'required',
            'supplier_telp' => 'required',
        ]);

        SupplierModel::find($id)->update([
            'supplier_nama' => $request->supplier_nama,
            'supplier_alamat' => $request->supplier_alamat,
            'supplier_telp' => $request->supplier_telp,
        ]);

        return redirect('/supplier')->with('success', 'Data supplier berhasil diubah');
    }

    public function destroy($id)
    {
        try {
            SupplierModel::find($id)->delete();
            return redirect('/supplier')->with('success', 'Data supplier berhasil dihapus');
        } catch (\Exception $e) {
            return redirect('/supplier')->with('error', 'Data supplier gagal dihapus karena masih digunakan');
        }
    }
}
