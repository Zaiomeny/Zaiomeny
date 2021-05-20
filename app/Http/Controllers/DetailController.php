<?php

namespace App\Http\Controllers;

use App\Models\Detail;
use Illuminate\Http\Request;

class DetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $detailS = Detail::latest()->get();
        return view('Details.index',compact('detailS'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return back();
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
            'activite_id'       => 'required',
            'agent_id'          => 'required',
            'libele_d_activite' => 'required',
            'prix'              => 'required',
            
        ]);
        
            $activite_id        = $request->activite_id;
            $agent_id           = $request->agent_id;
            $libele_d_activite  = $request->libele_d_activite;
            $prix               = $request->prix;
            
        for($i = 0; $i < count($libele_d_activite) ;$i++){
            $datasave = [
                'activite_id'       => $activite_id,
                'agent_id'          => $agent_id,
                'libele_d_activite' => $libele_d_activite[$i],
                'prix'              => $prix[$i],
                

           ];
            
            Detail::create($datasave);
            
        }
        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function show(Detail $detail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function edit(Detail $detail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detail $detail)
    {
        $request->validate([
            'activite_id'       => 'required',
            'agent_id'          => 'required',
            'libele_d_activite' => 'required',
            'prix'              => 'required',
        ]);
        $detail->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detail  $detail
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detail $detail)
    {
        $detail->delete();
        return back();
    }

    public function supprimer($detail)
    {
        Detail::where('id',$detail)->delete();
        return back();

    }
}
