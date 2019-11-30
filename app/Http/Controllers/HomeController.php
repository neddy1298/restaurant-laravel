<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Masakan;

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
        $masakans = Masakan::latest()->paginate(5);
        return view('dashboard', compact('users', 'masakans'))
            ->with('i', (request()->input('page', 1) - 1) * 5)
            ->with('no', '1');
    }
}
