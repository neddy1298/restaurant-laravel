<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Masakan;
use Illuminate\Support\Facades\DB;

class MasakanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $masakans = Masakan::latest()->paginate(5);
        return view('masakan.index', compact('masakans'))
            ->with('no', (request()->input('page', 1) - 1) * 5);
    }

    public function tambah(Request $request)
    {
        DB::table('tbl_masakans')->insert([
            'gambar_masakan' => 'default.jpg',
            'nama_masakan' => $request->nama_masakan,
            'harga' => $request->harga,
            'status_masakan' => $request->status_masakan,
        ]);

        return redirect('/masakan')->with('success', 'Data berhasil dibuat.');
    }

    public function hapus($id_masakan)
    {
        DB::table('tbl_masakans')->where('id_masakan', $id_masakan)->delete();

        return redirect('/masakan')->with('danger', 'Data berhasil dihapus.');
    }
    public function edit(Request $request)
    {

        $file = $request->file('gambar_masakan');
        $namaFile = $file->getClientOriginalName();
        $file->move(public_path('assets/img/masakan/'), $namaFile);
        DB::table('tbl_masakans')->where('id_masakan', $request->id_masakan)->update([
            'gambar_masakan' => $namaFile,
            'nama_masakan' => $request->nama_masakan,
            'harga' => $request->harga,
            'status_masakan' => $request->status_masakan
        ]);

        return redirect('/masakan')->with('warning', 'Data berhasil diupdate.');
    }
}
