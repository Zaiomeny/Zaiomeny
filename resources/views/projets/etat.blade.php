<x-app-layout>
    <div class="w-100 bg-white rounded shadow-sm p-4">
        <p class="float-start">
            <h6>RECAPITULATION FINANCIERE</h6>

            @foreach($projetS as $projet)
            <h6> <i class="icofont icofont-investigation"></i> ACTIVITE :{{ $projet->nom }}</h6>
            @endforeach
        </p>
    </div>

    <div class="w-100 mt-2 bg-white rounded shadow-sm p-4">
        
        @foreach($projetS as $projet)
            <h6 class="ml-2">Réf BR n° - {{ $projet->num_br }}</h6>
        @endforeach
        
        <table class="table table-bordered">
            <thead class="bg-dark">
                <tr>
                    <th class="text-center align-middle">Equipe</th>
                    <th class="text-center align-middle">Bénéficiaire</th>
                    <th class="text-center align-middle">Code <br> Analytique</th>
                    <th class="text-center align-middle">Fonction</th>
                    <th class="text-center align-middle">Libéllé de <br> l'activité</th>
                    <th class="text-center align-middle">Fond réçu</th>
                    <th class="text-center align-middle">Tt justifiés</th>
                    <th class="text-center align-middle">Reste</th>
                    <th class="text-center align-middle">Observation</th>
                    <th class="text-center align-middle">Vérifié le</th>
                    <th class="text-center align-middle">Vérificateur</th>
                </tr>
            </thead>
            <tbody>
                
                <?php 
                $i=1;
                foreach($agentS as $agent)
                {
                    foreach($verificationS as $verification)
                    {
                        if($verification->agent_id == $agent->id)
                        {
                            $datashow =
                            [

                            ]
                            $activite_nom[$i] = $verification->activite_nom;
                            $total_a_justifier[$i] = $verification->total_a_justifier;
                            $total_justifie[$i] = $verification->total_justifie;
                            $reste[$i] = $verification->reste;
                            $i++;
                        }
                    
                    }
                    for($j=1;$j<=$i;$j++)
                    {
                        echo $activite_nom[$j].'<br>';
                    }
                
                }
                   
                ?>

                        
            </tbody>
        </table>
    </div>
</x-app-layout>