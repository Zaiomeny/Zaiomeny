<?php


namespace App\Http\Controllers;

use App\Models\Agents;
use App\Models\Projet;
use App\Models\Activites;
use App\Models\Notification;
use App\Models\Brs;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
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
    public function store(Request $request , $projets_id)
    {
        $request->validate([
            'nom'           => 'required',
            'fonction'      => 'required',
            'num_equipe'    => 'required',
            'adresse'       => 'required',
            'telephone'     => 'required',
            'projets_id'    => 'required',
        ]);
            $nom        = $request->nom;
            $prenom     = $request->prenom;
            $fonction   = $request->fonction;
            $num_equipe = $request->num_equipe;
            $adresse    = $request->adresse;
            $telephone  = $request->telephone;
            $projets_id = $request->projets_id;

        for($i = 0; $i < count($nom) ;$i++){
            $datasave = [
                'nom'        => $nom[$i],
                'prenom'     => $prenom[$i],
                'fonction'   => $fonction[$i],
                'num_equipe' => $num_equipe[$i],
                'adresse'    => $adresse[$i], 
                'telephone'  => $telephone[$i], 
                'projets_id' => $projets_id,

           ];
            
            Agents::create($datasave);
            
        }
        
        return back();
       
        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Agents  $agents
     * @return \Illuminate\Http\Response
     */
    public function show($agents_id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Agents  $agents
     * @return \Illuminate\Http\Response
     */
    public function edit($agents_id)
    {
        $agentS = Agents::where('id',$agents_id)
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
    public function update(Request $request,$agents_id)
    {
        $request->validate([          
            'nom'           => 'required',
            'fonction'      => 'required',
            'num_equipe'    => 'required',
            'adresse'       => 'required',
            'telephone'     => 'required',
            
        ]);

        $agentS = Agents::where('id',$agents_id)
                            ->get();
        
        foreach($agentS as $agent){}

        $notification = [
            'courte_description' => 'modifié le bénéficiaire ' . $agent->nom . ' ' . $agent->prenom,
            'longue_description' => 'modifié le bénéficiaire ' . $agent->nom . ' ' . $agent->prenom . ' en ' . $request->nom .' '. $request->prenom,
            'useurs_name' => Auth::user()->name,
        ];
        
        Notification::create($notification);   

        $agent->update($request->all());

        $projetS = Projet::where('id',$request->projets_id)->get();

        $agentS  = Agents::where('projets_id',$request->projets_id)
                                        ->orderBy('nom', 'asc')
                                        ->withCount('activites')
                                        ->paginate(20);


        return view('projets.list',compact('agentS','projetS'));
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
     * Create agent with projets_id
     */
    public function forge(Request $request , $projets_id)
    {
        $request->validate([
            'nom'        => 'required',
            'fonction'   => 'required',
            'num_equipe' => 'required',
            'adresse'    => 'required',
            'telephone'  => 'required',
            'projets_id' => 'required',
        ]);
            $nom        = $request->nom;
            $prenom     = $request->prenom;
            $fonction   = $request->fonction;
            $num_equipe = $request->num_equipe;
            $adresse    = $request->adresse;
            $telephone  = $request->telephone;
            $projets_id = $request->projets_id;

        for($i = 0; $i < count($nom) ;$i++){
            $datasave = [
                'nom'           => $nom[$i],
                'prenom'        => $prenom[$i],
                'fonction'      => $fonction[$i],
                'num_equipe'    => $num_equipe[$i],
                'adresse'       => $adresse[$i], 
                'telephone'     => $telephone[$i], 
                'projets_id'    => $projets_id,

           ];
            
            Agents::create($datasave);
            
        }
        
        return back();
        
       
        
        
    }

    /**
     * voir la liste de bénéficiaires par br
     */
    public function list($projet)
    {  
        $projetS = Projet::where('id',$projet)->get(); 

        $agentS  = Agents::where('projets_id',$projet)
                            ->orderBy('nom', 'asc')
                            ->withCount('activites')
                            ->paginate(20);
        Agents::withCount('activites')->get();
                                        
        return view('projets.list',compact('agentS','projetS'));
    }

    /**
     * Vérification
     */
    public function verifier($projets_id, $agents_id)
    {
            $projetS    = Projet::where('id',$projets_id)->get();
            $agentS     = Agents::where('id',$agents_id)
                                    ->withCount('verifications')
                                    ->get();

            $activiteS  = Activites::where('agents_id',$agents_id)
                                    ->where('projets_id',$projets_id)
                                    ->get();
            

            $detailS    = DB::table('details')->where('agents_id',$agents_id)
                                                ->get();
            return view('agents.verification',compact('projetS','agentS','activiteS','detailS'));
    }

    /**
     * Rechercher
     * @param  \Illuminate\Http\Request  $request
     */

     public function chercher(Request $request)
     {
        $projet_id = $request->projets_id;
        
        $mot_cle = $request->agents_chercher;

       
        $projetS = Projet::where('id',$projet_id)->get(); 
        
        $agentS  = Agents::where('projets_id','=',$projet_id)
                            ->where('nom','LIKE','%'.$mot_cle.'%')
                                         
                            ->withCount('activites')
                            ->orderBy('nom', 'asc')
                            ->paginate(20);
                                       
        return view('projets.list',compact('agentS','projetS'));
        
     }
     /**
      * Suppression
      */
      public function supprimer($agents_id)
      {
        $agent=Agents::where('id',$agents_id)->delete();
        return back();
      }
      /**
       * Suppression multiple 
       */
      public function suppimerTout(Request $request)
      {
        
        $id = $request->ids;
        
        for ($i=0 ; $i <count($request->ids);$i++){
            Agents::where('id',$id[$i])->delete();
        }
        return back();
      }
}
