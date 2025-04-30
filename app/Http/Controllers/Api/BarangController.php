<?php

namespace App\Http\Controllers\Api;

use App\Models\BarangModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    public function index()
    {
        return BarangModel::all();
    }

    public function store(Request $request)
    {
        return BarangModel::create($request->all());
    }

    public function show($id)
    {
        return BarangModel::find($id);
    }

    public function update(Request $request, $id)
    {
        $data = BarangModel::find($id);
        $data->update($request->all());
        return $data;
    }

    public function destroy(BarangModel $barang)
    {
        $barang->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data terhapus',
        ]);
    }
}
