<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Autor;
use DataTables;

class AutoriController extends Controller
{


    public function autoretList()
    {
        $autoret = Autor::all();
        $table = DataTables::of($autoret)
        ->addColumn('Shto' ,'<a class="btn btn-circle btn-secondary btn-sm"   data-dismiss="modal" onclick="
        var sel = document.getElementById(\'autoret\');
        var opt = document.createElement(\'option\');
        var inp = document.getElementById(\'autoret-list\');
        opt.appendChild( document.createTextNode(\'{{$name}}\') );
        opt.value = \'{{$id}}\';
        sel.appendChild(opt);
        inp.value += \'{{$id}}\' +\',\';
        " ><i class="fa text-light fa-arrow-right"></i></a>')
        ->rawColumns(['Shto'])
        ->make(true);
        return $table;
    }

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
            'ditelindja' => 'required|date',
            'biografia' => 'required',
            'Foto' =>'image|nullable|max:1999',
        ]);
        $autori = new Autor;
        $autori->name = $request->name;
        $autori->periudha = $request->periudha;
        $autori->ditelindja = $request->ditelindja;
        $autori->biografia = $request->biografia;
        if($request->hasFile('Foto'))
        {
            $fileNamewithExt = $request->file('Foto')->getClientOriginalName();
            $fileName = pathInfo($fileNamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('Foto')->getClientOriginalExtension();
            $fileNametoStore = 'Autori-'.$request->name.'.'.$extension;
            $request->file('Foto')->move(public_path('img'), $fileNametoStore);
        }
        else
        {
            $fileNametoStore = 'no-image.png';
        }
        $autori->foto = $fileNametoStore;
        $autori->save();
        return redirect('/autor')->with('success','U shtua autori');
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
            'ditelindja' => 'required|date',
            'biografia' => 'required',
            'Foto' =>'image|nullable|max:1999',
        ]);
        $autori = Autor::find($id);
        if($request->hasFile('Foto'))
        {
            $fileNamewithExt = $request->file('Foto')->getClientOriginalName();
            $fileName = pathInfo($fileNamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('Foto')->getClientOriginalExtension();
            $fileNametoStore = 'Autori-'.$autori->name.'.'.$extension;
            $request->file('Foto')->move(public_path('img'), $fileNametoStore);
            $autori->foto = $fileNametoStore;
        }
        $autori->name = $request->name;
        $autori->periudha = $request->periudha;
        $autori->ditelindja = $request->ditelindja;
        $autori->biografia = $request->biografia;
        $autori->save();
        return redirect('/autor')->with('success','U ndryshua autori');
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
        $autori->libris()->detach();
        $autori->delete();
        return redirect('/autor')->with('success','U fshi autori');
    }
}
