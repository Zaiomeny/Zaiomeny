@extends('activites.layout')
@section('content')
<div class="row">
    <div class="w-100 d-flex justify-content-between">
        <div>
        @foreach($activiteS as $activite)
            Numéro BR : <strong>{{ $activite->num_br }}</strong> <br>
            Activité : <strong>{{ $activite->nom }}</strong>
        @endforeach
        </div>
    </div>
    <h4 class="mt-4">Liste de tous les agents travaillant sur cette activité :</h4>
        <table class="table table-striped table-borderless mt-2">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Equipe</th>
                    <th>Fonction</th>
                    <th>Montant réçue</th>
                    <th>Date de virement</th>
                </tr>
            </thead>
            <tbody>
                    @foreach( $brS as $br)
                        @foreach ($agentS as $agent)
                            @if($br->agent_id == $agent->id)
                            <tr>
                                <td>{{ $agent->nom }}</td>
                                <td>{{ $agent->prenom }}</td>
                                <td>n° {{ $br->num_equipe }}</td>
                                <td>{{ $br->fonction }}</td>
                                <td>{{ $br->montant }} Ar</td>
                                <td>{{ $br->date_de_virement }}</td>
                            </tr>
                            @endif
                        @endforeach
                    @endforeach
            </tbody>
        </table>
    
</div>
@endsection