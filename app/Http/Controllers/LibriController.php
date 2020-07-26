<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libri;

class LibriController extends Controller
{

    public function librat()
    {
        $librat = Libri::all();
        return view('bibloteka.librat')->with('librat', $librat);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $librat = Libri::all();
        return view('libri.index')->with('librat', $librat);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('libri.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'isbn' => 'required|unique:libris|numeric|digits:10',
            'titulli' => 'required',
            'stoku' => 'required|numeric',
        ]);
        $libri = new Libri;
        $libri->ISBN = $request->isbn;
        $libri->titulli = $request->titulli;
        $libri->stoku = $request->stoku;
        $libri->save();
        return redirect('/libri');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $libri = Libri::find($id);
        return view('libri.show')->with('libri', $libri);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $libri = Libri::find($id);
        return view('libri.edit')->with('libri', $libri);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'isbn' => 'required|unique:libris|numeric|digits:10',
            'titulli' => 'required',
            'stoku' => 'required|numeric',
        ]);
        $libri = Libri::find($id);
        $libri->ISBN = $request->isbn;
        $libri->titulli = $request->titulli;
        $libri->stoku = $request->stoku;
        $libri->save();
        return redirect('/libri');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $libri = Libri::find($id);
        $libri->delete();
        return redirect('/libri');
        }
}
