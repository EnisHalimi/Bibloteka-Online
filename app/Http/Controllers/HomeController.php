<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libri;
use App\Zhanri;
use App\Autor;
use App\User;

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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $librat = Libri::paginate(15);
        $zhanret = Zhanri::orderBy('created_at','desc')->limit(10)->get();
        return view('bibloteka.index')->with('librat', $librat)->with('zhanret', $zhanret);
    }
}
