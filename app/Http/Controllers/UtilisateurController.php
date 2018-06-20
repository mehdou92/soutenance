<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UtilisateurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $utilisateurs = \App\Utilisateur::all();
        return view('index', compact('utilisateurs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $utilisateur = new \App\Utilisateur;
        $utilisateur->first_name=$request->get('first_name');
        $utilisateur->last_name=$request->get('last_name');
        $utilisateur->username=$request->get('username');
        $utilisateur->password=$request->get('password');
        $utilisateur->email=$request->get('email');
        $utilisateur->save();

        return redirect('utilisateurs')->with('success', 'Information has been added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $utilisateur = \App\Utilisateur::find($id);
        return view('edit', compact('utilisateur','id'));
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
        $utilisateur= \App\Utilisateur::find($id);
        $utilisateur->first_name=$request->get('first_name');
        $utilisateur->last_name=$request->get('last_name');
        $utilisateur->username=$request->get('username');
        $utilisateur->password=$request->get('password');
        $utilisateur->email=$request->get('email');
        $utilisateur->save();
        return redirect('utilisateurs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $utilisateur = \App\Utilisateur::find($id);
        $utilisateur->delete();
        return redirect('utilisateurs')->with('success','Information has been  deleted');
    }
}
