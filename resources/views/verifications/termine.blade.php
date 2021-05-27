<x-app-layout>
    <div class="w-100">
        <h6 class="text-left text-muted">Liste d' activités vérifiées</h6>
    </div>
    <div class="w-100 p-4 bg-white">
        <table class="table table-striped table-hover">
            <thead class="table-inverse">
                <tr>
                    <th class="align-middle">Bénéficiaire</th>
                    <th class="align-middle">Equipe</th>
                    <th>Libéllé <br> d'activité</th>
                    <th class="align-middle">Obsérvation</th>
                    <th>Date de <br> vérification</th>
                    <th class="align-middle">Vérificateur</th>
                </tr>
            </thead>
            <tbody>
            
               @foreach($agentS as $agent)
                @if($agent->has('verification'))
                <tr>
                <td>{{ $agent->nom }}</td>
                <td>{{ $agent->num_equipe }}</td>
                <td>
                    @foreach($verificationS as $verification)
                        @if($agent->id == $verification->agents_id)
                            -{{ $verification->activite_nom }} <br>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($verificationS as $verification)
                        @if($agent->id == $verification->agents_id)
                            {{ $verification->observation }} <br>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($verificationS as $verification)
                        @if($agent->id == $verification->agents_id)
                            {{ $verification->date_de_verification }} <br>
                        @endif
                    @endforeach
                </td>
                <td>
                    @foreach($verificationS as $verification)
                        @if($agent->id == $verification->agents_id)
                            {{ $verification->verificateur }} <br>
                        @endif
                    @endforeach
                </td>
                
               </tr>
                @endif
                    
               @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>