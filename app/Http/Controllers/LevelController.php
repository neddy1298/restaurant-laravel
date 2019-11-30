<?php

namespace App\Http\Controllers;

use App\Level;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class LevelController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $levels = Level::get();
        return view('level.index', compact('levels'))
            ->with('no', '1')
            ->with('no2','1');
    }

    public function tambah(Request $request)
    {
        DB::table('tbl_levels')->insert([
            'nama_level' => $request->nama_level,
        ]);

        return redirect('/level')->with('success', 'Data berhasil dibuat.');
    }

    public function hapus($id_level)
    {
        DB::table('tbl_levels')->where('id_level', $id_level)->delete();

        return redirect('/masakan')->with('danger', 'Data berhasil dihapus.');
    }
    public function edit(Request $request)
    {
        DB::table('tbl_levels')->where('id_level', $request->id_level)->update([
            'nama_level' => $request->nama_level,
        ]);

        return redirect('/level')->with('warning', 'Data berhasil diupdate.');
    }
}
