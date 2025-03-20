<?php

namespace App\Http\Controllers;

use App\Models\LevelModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Monolog\Level;

class LevelController extends Controller
{
    public function index(){
        $data = LevelModel::all();

        return view('levelkategori.index', ['data' => $data]);
    }

    public function create(){
        return view('level.create_level');
    }

    public function store(Request $request){
        LevelModel::create([
            'level_kode' => $request->kodeLevel,
            'level_nama' => $request->namaLevel,
        ]);
        return redirect('/level');
    }
}
