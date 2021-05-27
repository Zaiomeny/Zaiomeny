<x-app-layout>
    <div class="w-100 bg-white rounded shadow-sm p-4">
        <p class="float-start">
            <h6>RECAPITULATION FINANCIERE</h6>

            @foreach($projetS as $projet)
            <h6> Nomination du BR : {{ $projet->nom }}</h6>
            @endforeach
            <h6 class="text-muted">A débuté le : {{ $projet->date }}</h6>
        </p>
    </div>

    <div class="w-100 mt-2 bg-white rounded shadow-sm p-4  table-responsive">

        <!--Référence BR-->
        <h6 class="ml-2">Réf BR n° - {{ $projet->num_br }}</h6>

        <table class="table table-hover table-bordered">
            <thead class="bg-ws">
                <tr>
                    <th class="text-center align-middle">Equipe</th>
                    <th class="text-center align-middle">Bénéficiaire</th>
                    <th class="text-center align-middle">Fonction</th>
                    <th class="text-center align-middle">Code <br> analytique</th>
                    <th class="text-center align-middle">Libéllé de <br> l'activité</th>
                    <th class="text-center align-middle">Montant <br> total</th>
                    <th class="text-center align-middle">Totaux <br> justifiés</th>
                    <th class="text-center align-middle">Reste</th>
                    <th class="text-center align-middle">Observation</th>
                    <th class="text-center align-middle">Vérifié <br> le</th>
                    <th class="text-center align-middle">Vérificateur</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($agentS as $agent)
                    <tr>

                        <!--Numéro équipe-->
                        <td class="text-center align-middle">
                            {{ $agent->num_equipe }}
                        </td>
                        
                        <!--Nom et prénom du bénéficiaire-->
                        <td  class="align-middle">
                            {{ $agent->nom }} <br> 
                            {{ $agent->prenom }}
                        </td>
                        
                        <!--Fonction du bénéficiaire-->
                        <td class="align-middle">
                            {{ $agent->fonction }}
                        </td>

                        <!--Code analytique-->
                        <td class="align-middle">
                            @foreach($verificationS as $verification)
                                @if($verification->agents_id == $agent->id)
                                    <?php $code_analytique = $verification->code_analytique; ?>
                                @endif
                            @endforeach
                            
                            @if(isset($code_analytique)) 
                                {{ $code_analytique }}
                            @endif
                        </td>
                        
                        <!--Nom de l'activité-->
                        <td>
                            @foreach($verificationS as $verification)
                                @if($verification->agents_id == $agent->id)
                                    - {{ $verification->activite_nom }} <br>
                                @endif
                            @endforeach

                        
                        </td>
                        
                        <!--Montant à justifier-->
                        <td>
                            @foreach($verificationS as $verification)
                                @if($verification->agents_id == $agent->id)
                                        {{ $verification->total_a_justifier }} <br> 
                                @endif
                            @endforeach        
                        </td>
                        
                        <!--Montant vérifié-->
                        <td>
                            @foreach($verificationS as $verification)
                                @if($verification->agents_id == $agent->id)        
                                        {{ $verification->total_justifie }} <br> 
                                    @endif
                            @endforeach        
                        </td>
                        
                        <!--Reste-->
                        <td>
                            @foreach($verificationS as $verification)
                                @if($verification->agents_id == $agent->id)        
                                        {{ $verification->reste }} <br> 
                                @endif
                            @endforeach  
                        
                        </td>
                        
                        <!--Obsérvation du vérificateur-->
                        <td>
                            @foreach($verificationS as $verification)
                                @if($verification->agents_id == $agent->id)         
                                        {{ $verification->observation }} <br>
                                @endif
                            @endforeach         
                        </td>
                        
                        <!--Date de vérification-->
                        <td class="align-middle">
                            <?php $date_de_verification =''; ?>
                            @foreach($verificationS as $verification)
                                @if($verification->agents_id == $agent->id)        
                                    <?php $date_de_verification =  $verification->date_de_verification; ?> 
                                @endif
                            @endforeach  
                            @if(isset($date_de_verification)) {{ $date_de_verification }} @endif      
                        </td>
                        
                        <!--Nom du vérificateur-->
                        <td class="align-middle">
                            <?php $verificateur =''; ?>
                            @foreach($verificationS as $verification)
                                @if($verification->agents_id == $agent->id)        
                                    <?php  $verificateur = $verification->verificateur; ?>
                                @endif
                            @endforeach       

                            @if($verificateur == '')
                                <a href="{{ route('agents.verifier',['projets_id'=> $projet->id,'agents_id'=> $agent->id]) }}" class="btn btn-sm btn-outline-danger">Vérifier</a>
                            @else
                                {{ $verificateur }}
                            @endif   
                        </td>
     
                    </tr>
                @endforeach   
            </tbody>
        </table>
    </div>
</x-app-layout>