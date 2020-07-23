<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zhanri;

class ZhanriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zhanret = Zhanri::all();
        return view('zhanri.index')->with('zhanret',$zhanret);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('zhanri.create');
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
            'titulli' => 'required',
        ]);
        $zhanri = new Zhanri;
        $zhanri->titulli = $request->titulli;
        $zhanri->save();
        return redirect('/zhaner');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $zhanri = Zhanri::find($id);
        return view('zhanri.show')->with('zhanri',$zhanri);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $zhanri = Zhanri::find($id);
        return view('zhanri.edit')->with('zhanri',$zhanri);
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
            'titulli' => 'required',
        ]);
        $zhanri = Zhanri::find($id);
        $zhanri->titulli = $request->titulli;
        $zhanri->save();
        return redirect('/zhaner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $zhanri = Zhanri::find($id);
        $zhanri->delete();
        return redirect('/zhaner');
    }
}
