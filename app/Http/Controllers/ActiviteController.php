<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Models\Activites;
use App\Models\Agents;
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
            'projet_id' => 'required',
            'agent_id' => 'required',
            'montant' => 'required',
            'date_de_virement' => 'required',
            
            
        ]);

        $nom = $request->nom;
        $projet_id = $request->projet_id;
        $agent_id = $request->agent_id;
        $montant = $request->montant;
        $date_de_virement = $request->date_de_virement;

        for($i = 0; $i < count($nom); $i++){
            $datesave = [
                'nom' => $nom[$i],
                'projet_id' => $projet_id,
                'agent_id' => $agent_id,
                'montant' => $montant[$i],
                'date_de_virement' => $date_de_virement[$i],
            ];
            Activites::create($datesave);
        }
        
        return back();
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
            'projet_id' => 'required',
            'agent_id' => 'required',
            'montant' => 'required',
            'date_de_virement' => 'required',
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
        return back();
    }

    public function liste($projet_id,$agent_id)
    {
        $projetS = Projet::where('id',$projet_id)->get();
        $activiteS = Activites::where('agent_id',$agent_id)->get();
        $agentS = Agents::where('id',$agent_id)->get();

        return view('activites.liste',compact('projetS','agentS','activiteS'));

    }
}
