<x-app-layout>

<?php $i = 1; ?>

<div class="card mb-0 shadow-none borderless">
    <div class="card-header">
        
        <div class="d-inline-block">
            <h6>CGP/UCGAI/INSTAT</h6>
            <h5>PAGE DE VERIFICATION </h5>

        </div>
        <div class="page-header-breadcrumb  float-end">
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
            <div class="col-6 b-r-default">
            <!--Projet-->
                
                                    
                    <h5>N° BR : {{ $projet->num_br }}-{{ $projet->nom }}</h5>
                    <p class="text-muted">A débuté le : {{ $projet->date }}</p>
                
            </div>
            <div class="col-6">
            <!--Agent-->
                @foreach ($agentS as $agent)
                    <h5>Bénéficiaire : {{ $agent->nom }} {{ $agent->prenom }}</h5>
                    <p class="text-muted"> Fonction : {{ $agent->fonction }} / Contact : {{ $agent->telephone }}</p>
                @endforeach
                
            </div>

        </div>
    </div>
        
</div>


    

    <div class="col-md-12 bg-white mt-2 pb-2 pl-4 pt-4 pr-4">
        <form action="{{ route('verifications.store') }}" method="post" class="w-100">
            @csrf

            <!--Date de vérification (date du jour)-->
            <input type="hidden" name="date_de_verification" value="{{ Date('d/m/Y') }}">
            <!--projets_id-->
            <input type="hidden" name="projets_id" value="{{ $projet->id }}">
            <!--agents_id-->
            <input type="hidden" name="agents_id" value="{{ $agent->id }}">
            <!--verificateur-->
            <input type="hidden" name="verificateur" value="{{ Auth::user()->name }}">


            <!--Activités-->
            <h4 class="text-muted">Activités</h4>
            <div class="w-100 mx-auto table-responsive">
                <table class="table table-hover table-borderless">
                    <thead class="bg-ws">
                        <tr>
                            <th>#</th>
                            <th>Activité</th>            
                            <th>Date du virement</th>
                            <th>Montant à valider</th>
                            <th>Total justifié</th>
                            <th>Reliquat reservé</th>
                            <th>Ajouter de details</th>
                            

                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach ($activiteS as $activite)
                            <?php
                                $sum = 0;

                                if(isset($detailS)){
                                    foreach($detailS as $detail){
                                        if($detail->activites_id == $activite->id){
                                            $sum += $detail->prix;
                                        }
                                    }
                                    $reste = $activite->montant - $sum ;
                                }
                            ?>
                                <tr>
                                    <input type="hidden" name="activite_nom[]"  class="h-100 w-100 borderless bg-none pt-0" value="{{ $activite->nom }}" readonly>

                                    <td>
                                        <b>{{ $i++ }}</b>
                                    </td>
                                    <td>
                                        {{ $activite->nom }}
                                    </td>                    
                                    <td>{{ $activite->date_de_virement }}</td>
                                    <td> 
                                        <input type="text" name="total_a_justifier[]" class="h-100 w-100 borderless bg-none pt-0" value="{{ $activite->montant }} Ar" readonly>
                                    </td>
                                    <td>
                                        <input type="text" name="total_justifie[]"  class="h-100 w-100 borderless bg-none p-0 " value="{{ $sum }} Ar " readonly>
                                    </td>
                                    <td class="text-center">
                                        <input type="text" name="reste[]"  class="h-100 w-100 borderless bg-none pt-0" value="{{ $reste }} Ar" readonly>
                                    </td>
                                    <td class="text-center">
                                        <button type="button" class="btn btn-sm text-danger m-0" data-toggle="modal" data-target="#ajout_details" onclick="$('#select_agents_id').val(<?= $activite->id; ?>);">
                                            <i class="icofont icofont-plus"></i>
                                        </button>
                                    </td>
                                    

                                    
                                </tr>

                        @endforeach
                        
                    </tbody>
                </table>
                <!--Bouton à la fois 'promouvoir à la vérification' et bouton pour ouvrir le modal#Etape_finale-->
                <div class="w-100 pt-4  mt-4">
                    <button type="button" class="suite text-ws fw-bold float-end align-middle" data-toggle="modal" data-target="#suite_verification" >
                        <span class="text-underline">Promouvoir à la vérification</span><span><i class="ti-angle-double-right"></i></span>
                    </button>
                    
                </div>
                <div class="modal fade mx-auto" id="suite_verification" tabindex="-1" role="dialog" aria-labelledby="Etape_finale" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title text-primary" id="Etape_finale">Etape finale</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body table-responsive">
                            <table class="table table-borderless table-hover">
                                <thead class="bg-ws">
                                    <tr>
                                        <th>Libéllé du détails</th>
                                        <th class="text-center">Montant brut</th>
                                        <th class="text-center">Reste</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                @foreach ($activiteS as $activite)
                                    <?php
                                        $sum = 0;

                                        if(isset($detailS)){
                                            foreach($detailS as $detail){
                                                if($detail->activites_id == $activite->id){
                                                    $sum += $detail->prix;
                                                }
                                            }
                                            $reste = $activite->montant - $sum ;
                                        }
                                    ?>
                                    <tr>
                                        <td>- {{ $activite->nom }}</td>
                                        <td class="text-center">{{ $activite->montant }} Ar</td>
                                        <td class="text-center">{{ $reste }} Ar</td>
                                    </tr>
                                    
                                    <tr>
                                        <td class="text-center p-2 bottom-bordered" colspan="3">
                                            <textarea name="observation[]" class="form-control w-100 m-0" rows="2" placeholder="Obsérvation"></textarea>
                                        </td>
                                        
                                    </tr>
                                    
                                @endforeach
                                </tbody>
                            </table>
                            <div class="w-100 mt-2">
                                <hr>
                                <div class="row">
                                    <div class="col-md-6 mt-1">
                                        <label for="">Date d'arrivé de PJs</label>
                                        <input type="date" name="date_d_arrivee_de_pjs" class="form-control" placeholder required>
                                    </div>
                                    <div class="col-md-6 mt-1">
                                        <label for="">Code analytique</label>
                                        <input type="text" name="code_analytique" class="form-control" >
                                    </div>
                                    <div class="col-md-12 mt-1">
                                        <label for="">Journal banquaire</label>
                                        <input type="text" name="journal_baquaire" class="form-control">
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer ">
                            <button type="submit" class="btn btn-sm btn-outline-primary">Approuver la vérification</button>
                        </div>
                        </div>
                    </div>
                </div>               
            </div>
        </form>
    </div>
    <!--Affichage de détails-->
    <div class="row mx-auto mt-2 pt-4 pb-4 bg-white">
        <h4 class="text-muted">Détails</h4>
            @if(isset($detailS))
                @foreach($activiteS as $activite)
                <div  class="col-sm-12 col-md-6 col-lg-6 col-xl-6 shadow-sm bg-none mt-4 p-2 table-responsive">
                    <table class="table table-borderless">
                        <tbody>
                            <tr class="bg-ws">
                                <td>
                                    - {{ $activite->nom }} ( {{ $activite->montant }} Ar )
                                </td>
                            </tr>
                            <tr>
                                <td colspan="2">
                                    <div class="table-responsive">
                                        <table class="table table-borderless">
                                            <tr class="bottom-bordered">
                                                
                                                <td>Détails</td>
                                                <td>Prix</td>
                                                <td class="text-center pt-1">
                                                    <button type="button" class="btn text-danger m-0" data-toggle="modal" data-target="#ajout_details" onclick="$('#select_agents_id').val(<?= $activite->id; ?>);">
                                                        <i class="icofont icofont-plus"></i>
                                                    </button>
                                                    
                                                </td>
                                            </tr>
                                            <?php $somme = 0; ?>
                                            @foreach($detailS as $detail)
                                                @if($detail->activites_id == $activite->id)
                                                    <?php
                                                        $somme += $detail->prix;
                                                    ?>
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
                                                <td></td>
                                                <td>
                                                    @if( $somme !==0 )
                                                        <u>{{ $somme }}</u> Ar
                                                    @endif
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
            @endif
                
    </div>



<!--Ajout de détails-->

<div class="modal fade" id="ajout_details" tabindex="-1" role="dialog" aria-labelledby="ajout_detailsLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text-muted" id="ajout_detailsLabel">Ajout du détails</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('details.store') }}" method="post">
            @csrf 
                <div class="modal-body">
                
                    <!--agents_id-->
                    <input type="hidden" name="agents_id" value="{{ $agent->id }}">
                
                    <div class="form-row">
                        <div class="w-100">
                            <div class="w-100  bg-white shadow-lg">
                                <div class="float-start">
                
                                <!--activites_id-->
                                    <div class="form-group">
                                        
                                            <select name="activites_id" class="form-select" id="select_agents_id" required>
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
                                        <!--Libéllé d' activité-->
                                        <td class="p-1"> 
                                            <input class="form-control" type="text" name="libele_d_activite[]" required> 
                                        </td>

                                        <!--Prix-->
                                        <td class="p-1"> 
                                            <input class="form-control" type="text" name="prix[]" required> 
                                        </td>

                                        <!--Supprimer cette ligne de zones de saisie-->
                                        <td class="text-center"> 
                                            <i onclick="$(this).parent().parent().remove();" class="icofont icofont-ui-close btn btn-sm btn-square btn-outline-info"></i> 
                                        </td>
                                    </tr>
                            </tbody>
                        </table>
                        
                    </div>
                </div> 
                <!--fin du div corps-->
                
                <!--Bouton de soumission-->
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-outline-primary"><i class="icofont icofont-save"></i> Soumettre</button>
                </div>
            </form>
        </div>
    </div>
</div>


</x-app-layout>