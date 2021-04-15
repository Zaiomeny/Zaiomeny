<?php

namespace App\Http\Controllers;

use App\Models\Agents;
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
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'telephone' => 'required',
        ]);
        Agents::create($request->all());
        $agentS = Agents::latest()->get();
        return view('agents.index', compact('agentS'));
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
    public function edit(Agents $agents)
    {
        return view('agents.edit', compact('agents'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Agents  $agents
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agents $agents)
    {
        $request->validate([
            'nom' => 'required',
            'adresse' => 'required',
            'telephone' => 'required',
        ]);
        $agents->update($request->all());
        $agentS = Agents::latest()->get();
        return view('agents.index', compact('agentS'));
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
        $agentS = Agents::latest()->get();
        return view('agents.index', compact('agentS'));
    }
}
