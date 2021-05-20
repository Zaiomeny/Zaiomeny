<x-app-layout>
<?php
    $i = 0;
    
?>
    
        <!-- Tab variant tab card start -->
        <div class="card w-100">
            <div class="card-header">
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                            <li><i class="icofont icofont-simple-left "></i></li>
                            <!--Minimiser-->
                            <li><i class="icofont icofont-minus minimize-card"></i></li>
                            <!--Actualiser-->
                            <li><i class="icofont icofont-refresh reload-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-block tab-icon w-100" id="ajout">
                <!-- Row start -->
                <div class="row">
                    <div class="col-lg-12 col-xl-12">
                        <!-- <h6 class="sub-title">Tab With Icon</h6> -->
                        <div class="sub-title">
                        
                        @foreach($projetS as $projet)
                            <div class="page-header-tittle">
                                <div class="d-inline">
                                
                                    <h5 class="text-left text-dark bg-gray p-2">
                                        <i class="icofont icofont-investigation"></i>
                                        {{ $projet->num_br }} {{ $projet->nom }} {{ $projet->date }}
                                        
                                    </h5>
                                    
                                </div>
                            </div>
                        @endforeach
                        
                        
                        
                        </div>
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs lg-tabs " role="tablist">
                            
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#agent" role="tab"><i class="icofont icofont-investigator "></i>Bénéficiares</a>
                                
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#nouveau" role="tab"><i class="icofont icofont-investigator "></i>Nouveau bénéficiare</a>
                                
                            </li>
                            
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content card-block w-100" id="activ">
                            
                            <div class="tab-pane active" id="agent" role="tabpanel">
                                


                                <div class="col-md-12 col-lg-12 p-0 rounded bordered  mt-2">
                                    
                                    <table class="table table-hover mb-4">
                                        <thead  class="bg-gray">
                                            
                                            

                                            <tr>
                                                <th>Nom(s)</th>
                                                <th>Prénom(s)</th>
                                                <th>Fonction</th>
                                                <th class="text-center">Equipe</th>
                                                
                                                <th></th>
                                                <th class="text-center th-l-bordered" ><i class="icofont icofont-tools-alt-2"></i> Outils</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($agentS as $agent)
                                            <tr>
                                                <td>{{ $agent->nom }}</td>
                                                <td>{{ $agent->prenom }}</td>
                                                <td>{{ $agent->fonction }}</td>
                                                <td class="text-center">N° {{ $agent->num_equipe }}</td>
                                                
                                                <!--Action -->
                                                <td class="text-center">
                                                    <a style="text-decoration:none;" href="{{ route('activites.liste',['projet_id'=>$projet->id,'agent_id'=> $agent->id]) }}" class="text-primary fw-bold">Ses activités</a>
                                                    
                                                </td>
                                                <!--Outils suppreion, modification-->
                                                <td  class="text-center">
                                                    <form action="{{ route('agents.destroy',$agent->id) }}" method="POST">
                                                        <a href="{{ route('agents.edit',$agent->id) }}" class="btn btn-sm btn-outline-primary"><i class="icofont icofont-ui-edit"> Modifier</i></a>
                                                        @csrf 
                                                        @method('DELETE')
                                                        <button type="submit" onclick="return confirm('Attention, cet action sera irréversible !')" class="btn btn-sm btn-outline-danger"><i class="icofont icofont-trash"> Supprimer</i></button>
                                                    </form>
                                                </td>
                                            </tr>
                                            
                                            <?php $i++; ?>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
    
                            </div>
                            <div class="tab-pane" id="nouveau" role="tabpanel">
                           
                                
                                        @foreach($projetS as $projet)
                                            <form action="{{ route('agents.forge',$projet->id) }}" method="post" class="pt-0 p-4">
                                                @csrf 
                                                @method('GET')
                                                <!--Projet_id-->
                                                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 col-xl-12 p-0">
                                                    @foreach ($projetS as $projet)
                                                       <input type="hidden" name="projet_id" value="{{ $projet->id }}">
                                                    @endforeach
                                                </div>

                                                
                            
                                                        <div id="bloc"  class="para">

                                                            <div class="w-100">
                                                                <i class="icofont icofont-plus float-end btn btn-square btn-sm btn-outline-primary mb-1 mr-1" id="addRow"> Zone de saisie</i>
                                                            </div>
                                                                                                                        
                                                            <div class="form-row bg-personnel-ws w-100"  id="formulaire">

                                                                <div class="w-100 p-0"> 
                                                                    <i class="icofont icofont-ui-close btn btn-sm btn-square btn-outline-danger  float-end btn-x-ws mb-1" id="remove"></i>
                                                                   
                                                                </div>
                                                                <!--Noms-->
                                                                    <div class="col-lg-4 col-xs-4 col-md-6 col-sm-12">
                                                                        <div class="input-group">
                                                                            
                                                                            <input type="text" name="nom[]"  class="form-control form-txt-primary form-control-bold" placeholder="Noms" required>
                                                                        </div>
                                                                    </div>
                                                                <!--Prénoms-->
                                                                    <div class="col-lg-4 col-xs-4 col-md-6 col-sm-12">
                                                                        <div class="input-group">
                                                                            
                                                                            <input type="text" name="prenom[]"  class="form-control form-txt-primary form-control-bold" placeholder="Prénoms">
                                                                        </div>
                                                                    </div>
                                                                <!--Fonction-->
                                                                    <div class="col-lg-4 col-xs-4 col-md-6 col-sm-12">
                                                                        <div class="input-group">
                                                                            
                                                                            <input type="text" name="fonction[]"  class="form-control form-txt-primary form-control-bold" placeholder="Fonction" required>
                                                                        </div>
                                                                    </div>
                                                                <!--Numéro Equipe-->
                                                                    <div class="col-lg-4 col-xs-4 col-md-6 col-sm-12">
                                                                        <div class="input-group">
                                                                            
                                                                            <input type="text" name="num_equipe[]"  class="form-control form-txt-primary form-control-bold" placeholder="Equipe n° " required>
                                                                        </div>
                                                                    </div>
                                                                <!--Adresse-->
                                                                    <div class="col-lg-4 col-xs-4 col-md-6 col-sm-12">
                                                                        <div class="input-group">
                                                                            
                                                                            <input type="text" name="adresse[]"  class="form-control form-txt-primary form-control-bold" placeholder="Adresse" required>
                                                                        </div>
                                                                    </div>
                                                                <!--Téléphone-->
                                                                    <div class="col-lg-4 col-xs-4 col-md-6 col-sm-12">
                                                                        <div class="input-group">
                                            
                                                                            <input type="text" name="telephone[]"  class="form-control form-txt-primary form-control-bold" placeholder="Téléphone" required>
                                                                        </div>
                                                                    </div>
                                                                    
                                                                
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                    
                                            
                                                <div class="form-group pt-3">
                                                    <h5 class="valider">
                                                        <button type="submit"  class=" btn btn-sm btn-out btn-square btn-grd-primary float-end mr-1 text-white">
                                                            <i class="ti-save-alt"> Soumettre</i>
                                                        </button>
                                                    </h5>
                                                </div>
                                            </form>
                                            @endforeach

                                
                            </div>
                            
                        </div>
                    </div>
                    
                </div>
                <!-- Row end -->
            </div>
        </div>
        <!-- Tab variant tab card start -->
 
    

</x-app-layout>