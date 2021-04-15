@extends('activites.layout')
@section('content')
<div class="row">
    <div class="col-md-2 bg-info rounded">
        <h2 class="text-center bg-white mt-2" style="border-radius:50%; height:150px; padding-top:50px;">INSTAT</h2>
        <p class="text-white fw-bold">Lorem ipsum dolor sit amet consectetur adipisicing elit. Velit? </p>
    </div>
    <div class="col-md-8">
        <div>
            <span><a href="{{ route('agents.index') }}" class="btn btn-outline-primary mt-2">Agents</a></span>
            <span><a href="{{ route('brs.index') }}" class="btn btn-outline-primary mt-2">Bordereau de règlement</a></span>
            <span><a href="{{ route('activites.index') }}" class="btn btn-outline-primary mt-2">Activités</a></span>
        </div>
    </div>
</div>
@endsection