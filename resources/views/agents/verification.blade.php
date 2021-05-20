<x-app-layout>

<?php 
    $i = 1;
    

?>

    <div class="card mb-0">
        <div class="card-block">
            <h5>CGP/UCGAI/INSTAT</h5>
            <h6>OUTPUT DE VERIFICATION </h6>
            <h6>Date d'arrivée de PJs : {{ Date('d/m/Y') }}</h6>
            <hr>
            <div class="page-header-breadcrumb">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="/">
                            <i class="icofont icofont-home"></i>
                        </a>
                    </li>
                    <li class="breadcrumb-item">
                        @foreach ($projetS as $projet)
                            <a href="{{ route('projets.list',$projet->id) }}">Liste de bénéficiaires</a>
                        @endforeach
                    </li>
                    
                </ul>
            </div>
        </div>
    </div>



    <!--Projet-->
        <div class="col-md-6 col-xl-6">
            <div class="card widget-card-1">
                <div class="card-block-small">
                    <i class="icofont icofont-investigation bg-c-blue card1-icon"></i>
                    @foreach($projetS as $projet)
                        <h5 class="text-c-blue">N° BR : {{ $projet->num_br }}</h5>
                        <span class="text-c-blue f-w-600">Libéllé :  {{ $projet->nom }}</span>
                        
                    
                        <div>
                            <span class="f-left m-t-10 text-muted">
                                <i class="text-c-blue f-16 icofont icofont-ui-timer m-r-10"></i>Année {{ $projet->date }}
                            </span>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    <!--Agent-->
    <div class="col-md-6 col-xl-6">
        <div class="card widget-card-1">
            <div class="card-block-small">
                <i class="icofont icofont-investigator bg-c-yellow card1-icon"></i>
                @foreach ($agentS as $agent)
                    <h5 class="text-c-yellow">Bénéficiaire :</h5>
                    <span class="text-c-yellow f-w-600">{{ $agent->nom }} {{ $agent->prenom }}</span>
                    
                    <div>
                        <span class="f-left m-t-10 text-muted">
                            <i class="text-c-yellow f-16 icofont icofont-graduate-alt m-r-2"></i> Fonction : {{ $agent->fonction }} 
                        </span>
                    </div>
                    <div>
                        <span class="f-left m-t-10 text-muted">
                            <i class="text-c-yellow f-16 icofont icofont-ui-cell-phone m-r-2 m-l-2"></i> Contact : {{ $agent->telephone }}
                        </span>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    
<form action="{{ route('verifications.store') }}" method="post" class="w-100">
@csrf

<input type="date" name="date_d_arrivee_de_pjs" required>
<input type="hidden" name="date_de_verification" value="{{ Date('d/m/Y') }}">
<!--Projet_id-->
@foreach($projetS as $projet)
    <input type="hidden" name="projet_id" value="{{ $projet->id }}">
@endforeach

<!--Agent_id-->
@foreach($agentS as $agent)
    <input type="hidden" name="agent_id" value="{{ $agent->id }}">
@endforeach
<!--verificateur-->
<input type="hidden" name="verificateur" value="{{ Auth::user()->name }}">


<!--Activités et détails-->

   <div class="p-5 col-md-12 col-lg-12 col-xl-12 mt-2 mx-auto bg-white shadow-md rounded">
        <table class="table table-borderless">
            <thead class="bg-ws">
                <tr>
                    <th>#</th>
                    <th>Activité</th>            
                    <th>Date</th>
                    <th>Mt à valider</th>
                    <th>Total justifié</th>
                    <th>Reste/Reliquat reservé</th>
                    

                </tr>
            </thead>
            <tbody>
                
                @foreach ($activiteS as $activite)
                <?php
                            $sum = 0;

                            if(isset($detailS)){
                                foreach($detailS as $detail){
                                    if($detail->activite_id == $activite->id){
                                        $sum += $detail->prix;
                                    }
                                }
                                $reste = $activite->montant - $sum ;
                            }
                ?>
                    <tr class='table-warning'>
                        <td><b>{{ $i++ }}</b>
                            <input type="hidden" name="activite_nom[]"  class="h-100 w-100 borderless bg-none pt-0" value="{{ $activite->nom }}" readonly>
                        </td>
                        <td>
                            {{ $activite->nom }}
                        </td>                    
                        <td>{{ $activite->date_de_virement }}</td>
                        <td> 
                            <input type="text" name="total_a_justifier[]" class="h-100 w-100 borderless bg-none pt-0" value="{{ $activite->montant }} Ar" readonly>
                        </td>
                        <td>
                            <input type="text" name="total_justifie[]"  class="h-100 w-100 borderless bg-none pt-0" value="{{ $sum }} Ar " readonly>
                        </td>
                        <td>
                            <input type="text" name="reste[]"  class="h-100 w-50 borderless bg-none pt-0" value="{{ $reste }} Ar" readonly>
                        </td>

                        
                    </tr>
                    @if(isset($detailS))
                            
                                <tr>
                                    <td colspan="4">
                                        <div class="w-100">
                                            <table class="table table-borderless">
                                                <thead>
                                                    <th>Libéllé de détails</th>
                                                    <th>Prix</th>
                                                    <th class="text-center mt-1">
                                                        <a href="#ajout_details" onclick="document.getElementById('select_agent_id').value = '<?= $activite->id; ?>';" class="icofont icofont-plus btn btn-sm">
                                                            détails
                                                        </a>
                                                    </th>
                                                </thead>
                                                <tbody>
                                                @foreach($detailS as $detail)
                                                    @if($detail->activite_id == $activite->id)
                                                        <tr>
                                                            <td>{{ $detail->libele_d_activite }}</td>
                                                            <td>{{ $detail->prix }} Ar</td>
                                                            <td class="text-center pt-0"> 
                                                                <a href="{{ route('details.supprimer',$detail->id) }}" class="btn btn-sm text-danger"><i class="icofont icofont-trash"></i></a>
                                                            </td>
                                                        </tr>
                                                        
                                                    @endif
                                                @endforeach
                                                
                                                       <tr>
                                                      
                                                        <td colspan="4">
                                                        <hr>
                                                        <h6 class="text-left">Observation :</h6>
                                                                <div class="form-group">
                                                                    <textarea name="observation[]" class="w-100 h-100 form-control"  placeholder="Observation"></textarea>
                                                                </div>
                                                            </td>
                                                       </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </td>
                                    
                                </tr>
                                
                    @endif

                @endforeach
                
            </tbody>
        </table>
        <div class="w-100 mt-2">
            <button type="submit" class="btn btn-sm btn-square btn-outline-danger float-end">Soumettre la vérification</button>
        </div>
    </div>
</form>


<!--Ajout de détails-->
<div class="col-md-12 mt-4 shadow-sm bg-white rounded p-4" id="ajout_details">
    <h6 class="text-left">Détails</h6>
    <hr>
    <form action="{{ route('details.store') }}" method="post">
        @csrf 
        <!--agent_id-->
        @foreach($agentS as $agent)
            <input type="hidden" name="agent_id" value="{{ $agent->id }}">
        @endforeach
        
            <div class="form-row">
                <div class="w-100">
                    <div class="w-100  bg-white shadow-lg">
                        <div class="float-start">
        
        <!--activite_id-->
                            <div class="form-group">
                                
                                    <select name="activite_id" class="form-select" id="select_agent_id" required>
                                    <option value="">Séléctionnez l' activité à vérifier</option>
                                    @foreach($activiteS as $activite)
                                        <option value="{{ $activite->id }}">{{ $activite->nom }} ( {{ $activite->montant }} Ar)</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                       

                    </div>
                </div>
                <table class="table table-bordered">
                    <thead class="bg-ws ">
                        <tr>
                            <th>Libéllé du détails</th>
                            <th>Prix</th>
                            <th class="text-center">
                                <i class="icofont icofont-plus btn btn-sm btn-square btn-outline-primary" id="ajout_ligne_details"></i>
                            </th>
                        </tr>
                    </thead>
                    <tbody  id="parent_details">
                            <tr>
                                <td class="p-1"> 
                                    <input class="form-control" type="text" name="libele_d_activite[]" > 
                                </td>
                                <td class="p-1"> 
                                    <input class="form-control" type="text" name="prix[]"> 
                                </td>
                                <td class="text-center"> 
                                    <i onclick="$(this).parent().parent().remove();" class="icofont icofont-ui-close btn btn-sm btn-square btn-outline-info"></i> 
                                </td>
                            </tr>
                    </tbody>
                </table>
                
            </div>
           
        
        <!--Bouton de soumission-->

            <div class="w-100 mt-2">
                <button type="submit" class="btn btn-sm btn-outline-danger btn-square float-end">Soumettre</button>
            </div>
        
    </form>
</div>




</x-app-layout>