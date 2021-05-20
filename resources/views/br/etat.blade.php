<x-app-layout>
    
<div class="w-100 border border-dark text-center mt-5">
    <strong>Liste des PJs vérifiées</strong>
</div>
<div class="w-100 mt-4">
    <table class="table table-striped table-borderless">
        <thead>
            <tr>
                <th>N° BR</th>
                <th>Activité</th>
                <th>Bénéficiaire</th>
                <th>Fonction</th>
                <th>Date de vérificatin</th>
                <th>Nom du vérificateur</th>
            </tr>
        </thead>
        <tbody>
            @foreach( $brS as $br)
                    @foreach ($agentS as $agent)
                        @foreach ($activiteS as $activite)
                            @if($br->agent_id == $agent->id)
                            <tr>
                                <td>{{ $activite->num_br }}</td>
                                <td>{{ $activite->nom }}</td>
                                <td>{{ $agent->nom }} {{ $agent->prenom }}</td>
                                <td>{{ $br->fonction }}</td>
                                <td>{{ $br->verifie_le }}</td>
                                <td>{{ $br->verificateur }}</td>

                            </tr>
                            @endif
                        @endforeach
                    @endforeach
                @endforeach
        </tbody>
    </table>
</div>

</x-app-layout>