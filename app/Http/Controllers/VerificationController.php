<?php

namespace App\Http\Controllers;

use App\Models\verification;
use App\Models\Agents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VerificationController extends Controller
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
            'projets_id'            => 'required',
            'agents_id'             => 'required',
            'activite_nom'          => 'required',
            'total_a_justifier'     => 'required',
            'total_justifie'        => 'required',
            'date_d_arrivee_de_pjs' => 'required',
            'verificateur'          => 'required',
        ]);

        $projets_id             = $request->projets_id;
        $agents_id              = $request->agents_id;
        $code_analytique        = $request->code_analytique;
        $journal_banquaire      = $request->journal_banquaire;
        $activite_nom           = $request->activite_nom;
        $total_a_justifier      = $request->total_a_justifier;
        $total_justifie         = $request->total_justifie;
        $reste                  = $request->reste;
        $observation            = $request->observation;
        $date_d_arrivee_de_pjs  = $request->date_d_arrivee_de_pjs;
        $date_de_verification   = $request->date_de_verification;
        $verificateur           = $request->verificateur;




        for($i = 0; $i < count($total_a_justifier) ; $i++)
            {
                $datasave = [
                    'projets_id'            => $projets_id,
                    'agents_id'             => $agents_id,
                    'code_analytique'       => $code_analytique,
                    'journal_banquaire'     => $journal_banquaire,
                    'activite_nom'          => $activite_nom[$i],
                    'total_a_justifier'     => $total_a_justifier[$i],
                    'total_justifie'        => $total_justifie[$i],
                    'reste'                 => $reste[$i],
                    'observation'           => $observation[$i],
                    'date_d_arrivee_de_pjs' => $date_d_arrivee_de_pjs,
                    'date_de_verification'  => $date_de_verification,
                    'verificateur'          => $verificateur,
                ];
                Verification::create($datasave);
            }

        $projetS        = DB::table('projets')->where('id',$projets_id)
                                                ->get();
        $agentS         = DB::table('agents')->where('id',$agents_id)
                                                ->where('projets_id',$projets_id)
                                                ->get();
        $activiteS      = DB::table('activites')->where('projets_id',$projets_id)
                                                ->where('agents_id',$agents_id)
                                                ->get();
        $verificationS  = Verification::where('agents_id',$agents_id)
                                        ->where('projets_id',$projets_id)
                                        ->get();
        $detailS        = DB::table('details')->where('agents_id',$agents_id)
                                                ->get();
        
        return view('verifications.output',compact('projetS','agentS','verificationS','activiteS','detailS'));
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\verification  $verification
     * @return \Illuminate\Http\Response
     */
    public function show(verification $verification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\verification  $verification
     * @return \Illuminate\Http\Response
     */
    public function edit(verification $verification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\verification  $verification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, verification $verification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\verification  $verification
     * @return \Illuminate\Http\Response
     */
    public function destroy(verification $verification)
    {
        $verification->delete();

        return back();
    }

    public function verificationsTermine()
    {
        $verificationS = verification::orderBy('created_at','desc')
                                        ->get();
       /* $verification_groupeds = $verificationS->groupBy('agents_id');*/

        $agentS = Agents::withCount('verifications')->get();

       
        return view('verifications.termine',compact('agentS','verificationS'));
    }
}
