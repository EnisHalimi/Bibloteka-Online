<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Libri;
use App\Autor;
use App\Zhanri;
use App\User;


class LibriController extends Controller
{


    public function rent(Request $request)
    {
        $libri = Libri::find($request->id);
        if($libri->stoku == 0)
            return redirect('/')->with('error','Nuk ka stok te librit');
        $user = User::find(auth()->user()->id);
        $dataM = date('Y-m-d');
        $dataK = date('Y-m-d', strtotime($dataM. ' + 30 days'));
        $user->libris()->attach($libri,['data_e_marrjes'=>$dataM, 'afati'=>$dataK, 'kthyer'=>false ]);
        $libri->stoku = $libri->stoku-1;
        $libri->save();
        return redirect('/kartoni')->with('success','Libri u morr me sukses');
    }

    public function return(Request $request)
    {
        $user = auth()->user();
        $libri = $user->libris()->where('kartoni.id','=',$request->id)->get()->first();
        $libri->pivot->kthyer = true;
        $libri->pivot->save();
        $lib = Libri::find($libri->id);
        $lib->stoku = $lib->stoku+1;
        $lib->save();
        return redirect('/kartoni')->with('success','Libri u kthye me sukses');
    }

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
        if(!auth()->user()->isAdmin)
            return redirect('/')->with('error','Nuk keni autorizim');
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
        if(!auth()->user()->isAdmin)
            return redirect('/')->with('error','Nuk keni autorizim');
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
        if(!auth()->user()->isAdmin)
            return redirect('/')->with('error','Nuk keni autorizim');

        $request->validate([
            'isbn' => 'required|unique:libris|numeric|digits:10',
            'titulli' => 'required',
            'stoku' => 'required|numeric',
            'Zhanret' => 'required',
            'Autoret' => 'required',
            'Foto' =>'image|nullable|max:1999',
        ]);
        $libri = new Libri;
        $libri->ISBN = $request->isbn;
        $libri->titulli = $request->titulli;
        $libri->stoku = $request->stoku;
        if($request->hasFile('Foto'))
        {
            $fileNamewithExt = $request->file('Foto')->getClientOriginalName();
            $fileName = pathInfo($fileNamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('Foto')->getClientOriginalExtension();
            $fileNametoStore = 'Libri-'.$request->isbn.'.'.$extension;
            $request->file('Foto')->move(public_path('img'), $fileNametoStore);
        }
        else
        {
            $fileNametoStore = 'no-image.png';
        }
        $libri->foto = $fileNametoStore;
        $libri->save();
        $zhanret  = explode(",",$request->input('Zhanret'));
        foreach($zhanret as $zhanri)
        {
            if($zhanri !== ' ')
            {
                $temp = Zhanri::find($zhanri);
                $libri->zhanris()->attach($temp);
            }

        }
        $autoret  = explode(",",$request->input('Autoret'));
        foreach($autoret as $autor)
        {
            if($autor !== ' ')
            {
                $temp = Autor::find($autor);
                $libri->autors()->attach($temp);
            }

        }
        return redirect('/libri')->with('success','U shtua Libri');
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
        if(!auth()->user()->isAdmin)
            return redirect('/')->with('error','Nuk keni autorizim');
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
        if(!auth()->user()->isAdmin)
            return redirect('/')->with('error','Nuk keni autorizim');

        $request->validate([
            'isbn' => ['required', 'numeric', 'digits:10', 'unique:libris,isbn,'.$id],
            'titulli' => 'required',
            'stoku' => 'required|numeric',
            'Zhanret' => 'required',
            'Autoret' => 'required',
            'Foto' =>'image|nullable|max:1999',
        ]);
        $libri = Libri::find($id);
        if($request->hasFile('Foto'))
        {
            $fileNamewithExt = $request->file('Foto')->getClientOriginalName();
            $fileName = pathInfo($fileNamewithExt, PATHINFO_FILENAME);
            $extension = $request->file('Foto')->getClientOriginalExtension();
            $fileNametoStore = 'Libri-'.$libri->isbn.'.'.$extension;
            $request->file('Foto')->move(public_path('img'), $fileNametoStore);
            $libri->foto = $fileNametoStore;
        }
        $libri->ISBN = $request->isbn;
        $libri->titulli = $request->titulli;
        $libri->stoku = $request->stoku;
        $libri->save();
        $libri->zhanris()->detach();
        $libri->autors()->detach();
        $zhanret  = explode(",",$request->input('Zhanret'));
        foreach($zhanret as $zhanri)
        {
            if($zhanri !== ' ')
            {
                $temp = Zhanri::find($zhanri);
                $libri->zhanris()->attach($temp);
            }
        }
        $autoret  = explode(",",$request->input('Autoret'));
        foreach($autoret as $autor)
        {
            if($autor !== ' ')
            {
                $temp = Autor::find($autor);
                $libri->autors()->attach($temp);
            }
        }
        return redirect('/libri')->with('success','U ndryshua Libri');
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
        $libri = Libri::find($id);
        $libri->zhanris()->detach();
        $libri->autors()->detach();
        $libri->users()->detach();
        $libri->delete();
        return redirect('/libri')->with('success','U fshi Libri');
        }
}
