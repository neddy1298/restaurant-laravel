<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function index()
    {
        $users = User::get();
        return view('user.index', compact('users'))
            ->with('i', (request()->input('page', 1) - 1) * 5)
            ->with('no', '1');
    }

    public function tambah(Request $request)
    {
        DB::table('users')->insert([
            'gambar_user' => 'user.jpg',
            'name' => $request->name,
            'email' => $request->email,
            'id_level' => $request->id_level,
        ]);
        return redirect('/user')->with('success', 'Data berhasil dibuat.');
    }

    public function hapus($id)
    {
        DB::table('users')->where('id', $id)->delete();

        return redirect('/user')->with('danger', 'Data berhasil dihapus.');
    }
    public function edit(Request $request)
    {

        $file = $request->file('gambar_user');
        $namaFile = $file->getClientOriginalName();
        $file->move(public_path('assets/img/user/'), $namaFile);
        DB::table('users')->where('id', $request->id)->update([
            'gambar_user' => $namaFile,
            'name' => $request->name,
            'email' => $request->email,
            'id_level' => $request->id_level
        ]);

        return redirect('/user')->with('warning', 'Data berhasil diupdate.');
    }
}
