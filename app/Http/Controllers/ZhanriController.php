<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Zhanri;
use DataTables;

class ZhanriController extends Controller
{

    public function search(Request $request)
    {
        $keyword = $request->keyword;
        $zhanret = Zhanri::where('titulli','LIKE',"%{$keyword}%")->paginate(15);
        return view('bibloteka.zhanret')->with('zhanret', $zhanret)->with('keyword',$keyword);
    }

    public function zhanretList()
    {
        $zhanret = Zhanri::all();
        $table = DataTables::of($zhanret)
        ->addColumn('Shto' ,'<a class="btn btn-circle btn-secondary btn-sm"   data-dismiss="modal" onclick="
        var sel = document.getElementById(\'zhanri\');
        var opt = document.createElement(\'option\');
        var inp = document.getElementById(\'zhanri-list\');
        opt.appendChild( document.createTextNode(\'{{$titulli}}\') );
        opt.value = \'{{$id}}\';
        sel.appendChild(opt);
        inp.value += \'{{$id}}\' +\',\';
        " ><i class="fa text-light fa-arrow-right"></i></a>')
        ->rawColumns(['Shto'])
        ->make(true);
        return $table;
    }

    public function zhanret()
    {
        $zhanret = Zhanri::paginate(15);
        return view('bibloteka.zhanret')->with('zhanret',$zhanret);
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
        $zhanret = Zhanri::paginate(15);
        return view('zhanri.index')->with('zhanret',$zhanret);
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
        if(!auth()->user()->isAdmin)
            return redirect('/')->with('error','Nuk keni autorizim');
        $request->validate([
            'titulli' => 'required',
        ]);
        $zhanri = new Zhanri;
        $zhanri->titulli = $request->titulli;
        $zhanri->save();
        return redirect('/zhaner')->with('success','U ndryshua zhanri');
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
        $librat = $zhanri->libris()->paginate(15);
        return view('zhanri.show')->with('zhanri',$zhanri)->with('librat',$librat);
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
        if(!auth()->user()->isAdmin)
            return redirect('/')->with('error','Nuk keni autorizim');
        $request->validate([
            'titulli' => 'required',
        ]);
        $zhanri = Zhanri::find($id);
        $zhanri->titulli = $request->titulli;
        $zhanri->save();
        return redirect('/zhaner')->with('success','U ndryshua zhanri');
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
        $zhanri = Zhanri::find($id);
        $zhanri->libris()->detach();
        $zhanri->delete();
        return redirect('/zhaner')->with('success','U fshi zhanri');
    }
}
