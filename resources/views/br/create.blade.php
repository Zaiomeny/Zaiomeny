@extends('activites.layout')
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto mt-2 p-4 shadow-lg bordered">
        <h5 class="text-center text-info">Nouveau virement</h5>
        <hr>
        <form action="{{ route('brs.store') }}" method="post">
        @csrf 
            <div class="form-group">
                <label for="activite_id">Activité</label>
                <select name="activite_id"  class="form-select">
                    @foreach ($activites as $activite)
                        <option value="{{ $activite->id }}">{{ $activite->nom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="agent_id">Agent</label>
                <select name="agent_id" class="form-select">
                    @foreach($agents as $agent)
                    <option value="{{ $agent->id }}">{{ $agent->nom }} {{ $agent->prenom }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="fonction">Fonction</label>
                <input type="text" name="fonction" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="num_equipe">Equipe n°</label>
                <input type="text" name="num_equipe"  class="form-control" required>
            </div>
            <div class="form-group">
                <label for="montant">Montant</label>
                <input type="text" name="montant" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="date_de_virement">Date de virement</label>
                <input type="date" name="date_de_virement" class="form-control" required>
            </div>
            <div class="form-group">
                <input type="hidden" name="etat" value="non_verifie">
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-outline-primary mt-2 float-end">Créer</button>
            </div>
        </form>
        </div>
    </div>
@endsection