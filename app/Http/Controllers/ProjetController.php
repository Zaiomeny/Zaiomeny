<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProjetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projetS = Projet::all();
        return view ('projets.index',compact('projetS'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('projets.create');
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
            'num_br' => 'required',
            'nom'    => 'required',
            'date'   => 'required',

       ]);
       Projet::create($request->all());
       $projetS = Projet::all();
        return view ('projets.index',compact('projetS'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function show(Projet $projet)
    {
        return view('projets.show',compact('projet'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function edit(Projet $projet)
    {
        return view('projets.edit',compact('projet'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Projet $projet)
    {
        $request->validate([
            'num_br' => 'required',
            'nom'    => 'required',
            'date'   => 'required',

        ]);
        $projet->update($request->all());
        $projetS = Projet::all();
        return view ('projets.index',compact('projetS'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Projet  $projet
     * @return \Illuminate\Http\Response
     */
    public function destroy(Projet $projet)
    {
        $projet->delete();
        $projetS = Projet::all();
        return view ('projets.index',compact('projetS'));

    }
    /**
     * voir la liste de bénéficiaires du br
     */
    public function list($projet)
    {  
        $projetS = Projet::where('id',$projet)->get();

        $activiteS = DB::table('activites')->where('projet_id',$projet)->get();

        $agentS = DB::table('agents')->where('projet_id',$projet)->get();
        return view('projets.list',compact('agentS','projetS','activiteS'));
    }
    /**
     * voir l'etat du br
     */
    public function etat($projet_id)
    {
        $projetS        = Projet::where('id',$projet_id)->get();
        $verificationS  = DB::table('verifications')->where('projet_id',$projet_id)->get();
        $agentS         = DB::table('agents')->where('projet_id',$projet_id)->get();

        return view('projets.etat',compact('projetS','verificationS','agentS'));
    }
}
