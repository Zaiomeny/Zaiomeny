<?php

namespace App\Http\Controllers;

use App\Models\Activites;
use App\Models\Brs;
use Illuminate\Http\Request;

class ActiviteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activiteS = Activites::latest()->get();
        return view('activites.index', compact('activiteS'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('activites.create');
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
            'nom' => 'required',
            'num_br' => 'required',
        ]);
        Activites::create($request->all());
        $activiteS = Activites::latest()->get();
        return view('activites.index', compact('activiteS'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activites  $activites
     * @return \Illuminate\Http\Response
     */
    public function show(Activites $activites)
    {
        return view('activites.show',compact('activites'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activites  $activites
     * @return \Illuminate\Http\Response
     */
    public function edit(Activites $activites)
    {
       return view('activites.edit',compact('activites'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activites  $activites
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Activites $activites)
    {
        $request->validate([
            'nom' => 'required',
            'num_br' => 'required',
        ]);
        $activites->update($request->all());
        $activiteS = Activites::latest()->get();
        return view('activites.index', compact('activiteS'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activites  $activites
     * @return \Illuminate\Http\Response
     */
    public function destroy($activite)
    {
        Activites::where('id',$activite)->delete();
        $activiteS = Activites::latest()->get();
        return view('activites.index', compact('activiteS'));
    }
}
