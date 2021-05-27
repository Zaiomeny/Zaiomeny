<?php

namespace App\Http\Controllers;

use App\Models\Projet;
use App\Models\Activites;
use App\Models\Agents;
use App\Models\Brs;
use App\Models\Notification;
use Illuminate\Support\Facades\Auth;
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
       //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        //
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
            'nom'               => 'required',
            'projets_id'        => 'required',
            'agents_id'         => 'required',
            'montant'           => 'required',
            'date_de_virement'  => 'required',
            
            
        ]);

        $nom                = $request->nom;
        $projets_id         = $request->projets_id;
        $agents_id          = $request->agents_id;
        $montant            = $request->montant;
        $date_de_virement   = $request->date_de_virement;

        for($i = 0; $i < count($nom); $i++){
            $datasave = [
                'nom'               => $nom[$i],
                'projets_id'        => $projets_id,
                'agents_id'         => $agents_id,
                'montant'           => str_replace([' ','.',','], ['','',''], $montant[$i]),
                'date_de_virement'  => $date_de_virement[$i],
            ];
            Activites::create($datasave);
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
       //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activites  $activites
     * @return \Illuminate\Http\Response
     */
    public function edit($projets_id,$agents_id, $activites_id)
    {
        $activiteS = Activites::where('id',$activites_id)
                                ->get();
        
        return view('activites.edit',compact('projets_id','agents_id','activiteS'));
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
            
            'nom'               => 'required',
            'projets_id'        => 'required',
            'agents_id'         => 'required',
            'montant'           => 'required',
            'date_de_virement'  => 'required',
        ]);
       
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

    public function liste($projets_id,$agents_id)
    {
        $projetS    = Projet::where('id',$projets_id)->get();
        $activiteS  = Activites::where('agents_id',$agents_id)->get();
        $agentS     = Agents::where('id',$agents_id)->get();

        return view('activites.liste',compact('projetS','agentS','activiteS'));

    }


    public function modifier(Request $request, $projets_id,$agents_id,$activites_id)
    {
        $request->validate([
            
            'nom'               => 'required',
            'montant'           => 'required',
            'date_de_virement'  => 'required',
        ]);

        $activiteS  = Activites::where('id',$activites_id)->get();

        $agentS    = Agents::where('id',$agents_id)->get();
        
        foreach($activiteS as $activite){}

        $notification = [
            'courte_description' => "modifié l' activité ".$activite->nom .' ('. $activite->montant.') Ar' ,
            'longue_description' => "modifié l' activité ".$activite->nom .' ('. $activite->montant.') Ar en '. $request->nom .' ('. $request->montant .') Ar',
            'useurs_name' => Auth::user()->name,
        ];
        
        Notification::create($notification);
        $montant = str_replace([' ','.',','], ['','',''], $request->montant);
        
        $datasave = [
            'nom'               => $request->nom,
            'montant'           =>$montant,
            'date_de_virement'  => $request->date_de_virement,
        ];

        Activites::where('id',$activites_id)->update($datasave);

        $projetS   = Projet::where('id',$projets_id)->get();
        $activiteS = Activites::where('agents_id',$agents_id)->get();
        $notificationS = Notification::where('etat' , 'vue')
                                        ->get();

        return view('activites.liste',compact('projetS','agentS','activiteS','notificationS'));
       
    }
}
