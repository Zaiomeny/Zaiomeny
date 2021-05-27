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
            //
        ]);
       //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brs  $brs
     * @return \Illuminate\Http\Response
     */
    public function show($agent_id)
    {
      //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brs  $brs
     * @return \Illuminate\Http\Response
     */
    public function edit(Brs $brs)
    {
        //
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
            //
        ]);
       //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brs  $brs
     * @return \Illuminate\Http\Response
     */
    public function destroy($br)
    {
       //
    }
 
}
