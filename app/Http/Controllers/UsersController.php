<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{

    public function kartoni()
    {
        $user = User::find(auth()->user()->id);
        return view('bibloteka.kartoni')->with('user',$user);
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
        $users = User::all();
        return view('users.index')->with('users',$users);
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
        return view('users.create');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->admin)
            $user->isAdmin = true;
        else
            $user->isAdmin = false;
        $user->password = Hash::make($request->password);
        $user->save();
        return redirect('/users')->with('success','U shtua perdoruesi');
        //
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
        $user = User::find($id);
        $librat = $user->libris()->get();
        return view('users.show')->with('user',$user)->with('librat',$librat);
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
        $user = User::find($id);
        return view('users.edit')->with('user',$user);
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
        $user = User::find($id);
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$id],
            'password' => ['confirmed'],
        ]);
        $user->name = $request->name;
        $user->email = $request->email;
        if($request->admin)
            $user->isAdmin = true;
        else
            $user->isAdmin = false;
        if($request->password > 0)
        {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect('/users')->with('success','U ndryshua perdoruesi');
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
        $user = User::find($id);
        $user->libris()->detach();
        $user->delete();
        return redirect('/users')->with('success','U fshi perdoruesi');
    }
}
