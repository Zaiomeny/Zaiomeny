<?php

namespace App\Http\Controllers;

use App\Models\Agents;
use App\Models\Projet;
use App\Models\Activites;
use App\Models\Brs;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $agentS = Agents::latest()->get();
        return view('agents.index', compact('agentS'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('agents.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request , $projet_id)
    {
            $nom = $request->nom;
            $prenom = $request->prenom;
            $fonction = $request->fonction;
            $num_equipe = $request->num_equipe;
            $adresse = $request->adresse;
            $telephone= $request->telephone;
            $projet_id = $request->projet_id;

        for($i = 0; $i < count($nom) ;$i++){
            $datasave = [
                'nom' => $nom[$i],
                'prenom' => $prenom[$i],
                'fonction' => $fonction[$i],
                'num_equipe' => $num_equipe[$i],
                'adresse' => $adresse[$i], 
                'telephone' => $telephone[$i], 
                'projet_id' => $projet_id[$i],

            ];
        
            Agents::insert($datasave);
        }
        $projetS = Projet::where('id',$projet)->get();       
        $agentS = DB::table('agents')->where('projet_id',$projet_id)->get();

        return view('projets.list',compact('agentS','projetS'));
        
       
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agents  $agents
     * @return \Illuminate\Http\Response
     */
    public function show($agent_id)
    {
        $activiteS = Activites::latest()->get();
        $brS = DB::table('brs')->where('agent_id',$agent_id)
                                ->where('etat','non_verifie')
                            ->get();
        $agentS = Agents::where('id',$agent_id)
                        ->get();
        return view('agents.show', compact('activiteS','brS','agentS'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agents  $agents
     * @return \Illuminate\Http\Response
     */
    public function edit($agents)
    {
        $agentS = Agents::where('id',$agents)
                        ->get();
        return view('agents.edit', compact('agentS'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agents  $agents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Agents $agents)
    {
        $request->validate([          
            'nom' => 'required',
            'fonction' => 'required',
            'num_equipe' => 'required',
            'adresse' => 'required',
            'telephone' => 'required',
            
        ]);
        
        $agents->update($request->all());

        $projetS = Projet::where('id',$request->projet_id)->get();

        $activiteS = DB::table('activites')->where('projet_id',$request->projet_id)->get();

        $agentS = DB::table('agents')->where('projet_id',$request->projet_id)->get();
        return view('projets.list',compact('agentS','projetS','activiteS'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Agents  $agents
     * @return \Illuminate\Http\Response
     */
    public function destroy($agent)
    {
        //dd($agent);
        Agents::where('id',$agent)->delete();
        return back();
    }

    /**
     * Create agent with projet_id
     */
    public function forge(Request $request , $projet_id)
    {
        $request->validate([
            'nom' => 'required',
            'fonction' => 'required',
            'num_equipe' => 'required',
            'adresse' => 'required',
            'telephone' => 'required',
            'projet_id' => 'required',
        ]);
            $nom = $request->nom;
            $prenom = $request->prenom;
            $fonction = $request->fonction;
            $num_equipe = $request->num_equipe;
            $adresse = $request->adresse;
            $telephone= $request->telephone;
            $projet_id = $request->projet_id;

        for($i = 0; $i < count($nom) ;$i++){
            $datasave = [
                'nom' => $nom[$i],
                'prenom' => $prenom[$i],
                'fonction' => $fonction[$i],
                'num_equipe' => $num_equipe[$i],
                'adresse' => $adresse[$i], 
                'telephone' => $telephone[$i], 
                'projet_id' => $projet_id,

           ];
            
            Agents::create($datasave);
            
        }
        
        return back();
        
       
        
        
    }
    public function verifier($projet_id, $agent_id)
    {
            $projetS = Projet::where('id',$projet_id)->get();
            $agentS = Agents::where('id',$agent_id)->get();
            $activiteS = Activites::where('agent_id',$agent_id)
                                    ->where('projet_id',$projet_id)
                                    ->get();
            

            $detailS = DB::table('details')->where('agent_id',$agent_id)
                                        ->get();
            return view('agents.verification',compact('projetS','agentS','activiteS','detailS'));
    }
}
