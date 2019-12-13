<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = DB::table('tbl_orders')
            ->latest()
            ->join('users', 'users.id', '=', 'tbl_orders.id_user')
            ->select('tbl_orders.*', 'users.name')
            ->paginate(5);

        return view('order.index', compact('orders'))
            ->with('no', (request()->input('page', 1) - 1) * 5);
        // return json_encode($detail_orders);
    }

    public function tambah(Request $request)
    {
        DB::table('tbl_orders')->insert([
            'id_user' => $request->id_user,
            'no_meja' => $request->no_meja,
            'tanggal' => $request->tanggal . ' ' . $request->time . ':00',
            'total_harga' => 0,
            'keterangan' => $request->keterangan,
            'status_order' => $request->status_order,
            'created_at' => now()
        ]);

        return redirect('/order')->with('success', 'Data berhasil dibuat.');
    }

    public function hapus($id_order)
    {
        DB::table('tbl_detail_order')->where('id_order', $id_order)->delete();
        DB::table('tbl_orders')->where('id_order', $id_order)->delete();

        return redirect('/order')->with('danger', 'Data berhasil dihapus.');
    }
    public function edit(Request $request)
    {
        DB::table('tbl_orders')->where('id_order', $request->id_order)->update([
            'id_user' => $request->id_user,
            'no_meja' => $request->no_meja,
            'keterangan' => $request->keterangan,
            'status_order' => $request->status_order,
        ]);

        return redirect('/order')->with('warning', 'Data berhasil diupdate.');
    }
    
    public function selesai(Request $request)
    {
        if($request->total_bayar < $request->total_harga)
        {
            return redirect('/order')->with('warning', 'Transaksi gagal, pastikan membayar tidak kurang dari harga yang harus dibayar.');
        }
        else
        {
            DB::table('tbl_orders')->where('id_order', $request->id_order)->update([
                'status_order' => 'Selesai'
            ]);
            DB::table('tbl_detail_order')->where('id_order', $request->id_order)->update([
                'status_detail_order' => 'Selesai'
            ]);
            DB::table('tbl_transaksis')->insert([
                'id_user' => $request->id_user,
                'id_order' => $request->id_order,
                'tanggal' => $request->tanggal . ' ' . $request->time . ':00',
                'total_bayar' => $request->total_bayar,
                'created_at' => now()
            ]);
            
            return redirect('/order')->with('success', 'Transaksi berhasil.');
        }

    }
}