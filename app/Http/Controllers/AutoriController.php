<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Autor;

class AutoriController extends Controller
{

    public function autoret()
    {
        $autoret = Autor::all();
        return view('bibloteka.autoret')->with('autoret',$autoret);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(!auth()->user()->isAdmin)
            return redirect('/')->with('error','Nuk keni autorizim');
        $autoret = Autor::all();
        return view('autori.index')->with('autoret',$autoret);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(!auth()->user()->isAdmin)
            return redirect('/')->with('error','Nuk keni autorizim');
        return view('autori.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if(!auth()->user()->isAdmin)
            return redirect('/')->with('error','Nuk keni autorizim');
        $request->validate([
            'name' => 'required',
            'periudha' => 'required',
        ]);
        $autori = new Autor;
        $autori->name = $request->name;
        $autori->periudha = $request->periudha;
        $autori->save();
        return redirect('/autor');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if(!auth()->user()->isAdmin)
            return redirect('/')->with('error','Nuk keni autorizim');
        $autori = Autor::find($id);
        return view('autori.show')->with('autori',$autori);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(!auth()->user()->isAdmin)
            return redirect('/')->with('error','Nuk keni autorizim');
        $autori = Autor::find($id);
        return view('autori.edit')->with('autori',$autori);
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
        if(!auth()->user()->isAdmin)
            return redirect('/')->with('error','Nuk keni autorizim');
        $request->validate([
            'name' => 'required',
            'periudha' => 'required',
        ]);
        $autori = Autor::find($id);
        $autori->name = $request->name;
        $autori->periudha = $request->periudha;
        $autori->save();
        return redirect('/autor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(!auth()->user()->isAdmin)
            return redirect('/')->with('error','Nuk keni autorizim');
        $autori = Autor::find($id);
        $autori->delete();
        return redirect('/autor');
    }
}
