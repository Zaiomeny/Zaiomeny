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
        $projetS = Projet::orderBy('nom', 'asc')
                            ->withCount('agents')
                            ->paginate(20);
                            
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

        $projetS = Projet::paginate(40);
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

        $projetS = Projet::paginate(40);
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
        return back();

    }
    
    /**
     * voir l'etat du br
     */
    public function etat($projets_id)
    {
        $projetS        = Projet::where('id',$projets_id)->get();
        $verificationS  = DB::table('verifications')->where('projets_id',$projets_id)
                                                    ->get();
        $agentS         = DB::table('agents')->where('projets_id',$projets_id)
                                                ->orderBy('nom', 'asc')
                                                ->get();
        
        return view('projets.etat',compact('projetS','verificationS','agentS'));
    }
    /**
     * Recherche 
     * @param  \Illuminate\Http\Request  $request
     */
    public function chercher(Request $request)
    {
        $mot_cle = $request->projets_chercher;

        $projetS = Projet::where('nom','LIKE','%'.$mot_cle.'%')
                            ->orWhere('num_br','LIKE','%'.$mot_cle.'%')
                            ->orderBy('nom', 'asc')
                            ->paginate(20);

        return view ('projets.index',compact('projetS'));
    }
}
