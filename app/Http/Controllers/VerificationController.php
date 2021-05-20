<?php

namespace App\Http\Controllers;

use App\Models\verification;
use Illuminate\Http\Request;

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
            'projet_id'             => 'required',
            'agent_id'              => 'required',
            'activite_nom'           => 'required',
            'total_a_justifier'     => 'required',
            'total_justifie'        => 'required',
            'date_d_arrivee_de_pjs' => 'required',
            'verificateur'          => 'required',
        ]);

        $projet_id              = $request->projet_id;
        $agent_id               = $request->agent_id;
        $activite_nom            = $request->activite_nom;
        $total_a_justifier      = $request->total_a_justifier;
        $total_justifie         = $request->total_justifie;
        $reste                  = $request->reste;
        $observation            = $request->observation;
        $date_d_arrivee_de_pjs  = $request->date_d_arrivee_de_pjs;
        $date_de_verification   = $request->date_de_verification;
        $verificateur           = $request->verificateur;


        for($i = 0; $i < count($total_a_justifier) ;$i++)
        {
            $datasave = [
                'projet_id'             => $projet_id,
                'agent_id'              => $agent_id,
                'activite_nom'           => $activite_nom[$i],
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
        //
    }
}
