<x-app-layout>

<?php $i = 1; ?>

<div class="w-100 mx-auto">
    <div class="card mb-0 shadow-none borderless">
        <div class="card-header">
            
            <div class="d-inline-block">
                <h6>CGP/UCGAI/INSTAT</h6>
                <h5>OUTPUT DE VERIFICATION </h5>

            </div>
            <div class="page-header-breadcrumb  float-end">
                <!--Liens-->
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{ route('projets.index') }}">Projets</a>
                    </li>
                    <li class="breadcrumb-item">
                        @foreach ($projetS as $projet)
                            <a href="{{ route('projets.list',$projet->id) }}">Liste de bénéficiaires</a>
                        @endforeach
                    </li>
                    
                </ul>
            </div>
        </div>
        <div class="card-block text-center">
            <div class="row">

                <!--Projet-->   
                <div class="col-6 b-r-default">         
                    <h5>N° BR : {{ $projet->num_br }}-{{ $projet->nom }}</h5>
                    <p class="text-muted">A débuté le : {{ $projet->date }}</p>
                </div>

                <!--Agent-->
                <div class="col-6">
                    @foreach ($agentS as $agent)
                        <h5>Bénéficiaire : {{ $agent->nom }} {{ $agent->prenom }}</h5>
                        <p class="text-muted"> Fonction : {{ $agent->fonction }} / Contact : {{ $agent->telephone }}</p>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

<!--Activités-->
    <div class="w-100 mx-auto mt-4 bg-white p-4">
        <div class="w-100">
            <h5 class="text-left text-muted">Activités</h5>
        </div>
        <hr>
        <div class="w-100-mt-3 table-responsive">
            <table class="table table-hover">
                <thead class="bg-ws">
                    <tr>
                        <th>#</th>
                        <th>Activité</th>
                        <th>Montant réçu</th>
                        <th>Total justifié</th>
                        <th>Reste/Reliquat reservé</th>
                        <th>Observation</th>
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($verificationS as $verification)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>
                                {{ $verification->activite_nom }}
                            </td> 
                            <td class="text-center">{{ $verification->total_a_justifier }} </td>
                            <td class="text-center">{{ $verification->total_justifie }} </td>
                            <td class="text-center">{{ $verification->reste }} </td>
                            <td> {{ $verification->observation }} </td>
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    
<!--Détails-->
    <div class="row mx-auto mt-2 pt-4 pb-4 bg-white">
        <h4 class="text-muted">Détails</h4>
            @foreach($activiteS as $activite)
            <div  class="col-sm-12 col-md-6 col-lg-6 col-xl-6 shadow-sm bg-none mt-4 p-2 table-responsive">
                <table class="table table-borderless">
                    <tbody>
                        <tr class="bg-ws">
                            <td>
                                - {{ $activite->nom }}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <div class="table-responsive">
                                    <table class="table table-borderless">
                                        <tr class="bottom-bordered">
                                            
                                            <td>Détails</td>
                                            <td>Prix</td>
                                            
                                        </tr>
                                        <?php $somme_details = 0; ?>
                                        @foreach($detailS as $detail)
                                            @if($detail->activites_id == $activite->id)
                                                <?php
                                                    $somme_details += $detail->prix;
                                                ?>
                                                <tr>
                                                    <td>{{ $detail->libele_d_activite }}</td>
                                                    <td>{{ $detail->prix }} Ar</td>
                                                    
                                                </tr>
                                                
                                            @endif
                                        @endforeach
                                        <tr>
                                            <td></td>
                                            <td>
                                                
                                            <u>{{ $somme_details }}</u> Ar
                                                
                                            </td>
                                            <td></td>
                                        </tr>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
            @endforeach
    </div>
</div>
<div class="w-100 mx-auto bg-white mt-2 p-2">
    <button class="btn btn-outline-success float-end">Convertir en fichier PDF</button>
</div>

</x-app-layout>