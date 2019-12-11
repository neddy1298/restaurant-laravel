<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Masakan;
use App\Order;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::get();
        $orders = Order::paginate(5);
        $masakans = Masakan::latest()->paginate(5);
        return view('dashboard', compact('users', 'masakans', 'orders'))
            ->with('i', (request()->input('page', 1) - 1) * 5)
            ->with('no', '1');
    }
}