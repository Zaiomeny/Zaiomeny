<?php

namespace App\Http\Controllers;

use App\Models\Brs;
use App\Models\Activites;
use App\Models\Agents;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class BrController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activiteS = Activites::latest()->get();
        $brS = Brs::latest()->get();
        $agents = Agents::latest()->get();
        return view('br.index', compact('brS','agents','activiteS'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agents = Agents::latest()->get();
        $activites = Activites::latest()->get(); 
        return view('br.create',compact('agents','activites'));
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
        

        ]);
        Brs::create($request->all());
        $brS = Brs::latest()->get();
        $agents = Agents::latest()->get();
        $activiteS = Activites::latest()->get();
        return view('br.index', compact('brS','agents','activiteS'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brs  $brs
     * @return \Illuminate\Http\Response
     */
    public function show($agent_id)
    {
        $brs = DB::table('brs')
                ->where('agent_id', $agent_id) 
                ->get();
        $agents = DB::table('agents')
                    ->where('id', $agent_id)
                    ->get();
        return view('br.show', compact('brs','agents'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brs  $brs
     * @return \Illuminate\Http\Response
     */
    public function edit(Brs $brs)
    {
        return view('br.edit', compact('brs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brs  $brs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brs $brs)
    {
        $request->validate([

            

        ]);
        $brs->update($request->all());
        $brS = Brs::latest()->get();
        return view('br.index', compact('brS'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brs  $brs
     * @return \Illuminate\Http\Response
     */
    public function destroy($br)
    {
        Brs::where('id',$br)->delete();
        $brS = Brs::latest()->get();
        return view('br.index', compact('brS'));
    }
    public function details($activite_id)
    {
        $activiteS = DB::table('activites')
                        ->where('id',$activite_id)
                        ->get();
        
        $agentS = Agents::latest()->get();
        return view('activites.details', compact('activiteS','agentS'));
    }
    public function etat($activite_id)
    {
        $activiteS = DB::table('activites')
                        ->where('id',$activite_id)
                        ->get();
        $brS = DB::table('brs')
                    ->where('activite_id', $activite_id)
                    ->where('etat','verifie')
                    ->get();
        $agentS = Agents::latest()->get();
        return view('br.etat', compact('activiteS','brS','agentS'));
    }
}
