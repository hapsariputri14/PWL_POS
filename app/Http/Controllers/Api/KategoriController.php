<?php

namespace App\Http\Controllers\Api;

use App\Models\KategoriModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index()
    {
        return KategoriModel::all();
    }

    public function store(Request $request)
    {
        return KategoriModel::create($request->all());
    }

    public function show($id)
    {
        return KategoriModel::find($id);
    }

    public function update(Request $request, $id)
    {
        $data = KategoriModel::find($id);
        $data->update($request->all());
        return $data;
    }

    public function destroy(KategoriModel $kategori)
    {
        $kategori->delete();
        return response()->json([
            'success' => true,
            'message' => 'Data terhapus',
        ]);
    }
}
