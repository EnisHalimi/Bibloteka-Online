<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libri;
use App\Zhanri;
use App\Autor;

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
        $librat = Libri::all();
        $zhanret = Zhanri::all();
        $autoret = Autor::all();
        return view('bibloteka.index')->with('librat', $librat)->with('zhanret', $zhanret)->with('autoret', $autoret);
    }
}
