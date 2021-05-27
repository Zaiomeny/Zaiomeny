<x-app-layout>

<?php $i = 0;?>
 
        <!-- Tab variant tab card start -->
        <div class="card w-100 mb-1">
            <div class="card-header">
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                            <li><i class="icofont icofont-simple-left "></i></li>
                            <!--Minimiser-->
                            <li><i class="icofont icofont-minus minimize-card"></i></li>
                            <!--Actualiser-->
                            <li><i class="icofont icofont-refresh reload-card"></i></li>
                            <!--Maximiser-->
                            <li><i class="icofont icofont-maximize full-card"></i></li>
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
                                    
                                        <h5 class="text-left text-dark  p-2">
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
                                <a class="nav-link" data-toggle="tab" href="#manipulation" role="tab"><i class="icofont icofont-tools-alt-2"></i>Manipulation</a>
                                
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#nouveau" role="tab"><i class="icofont icofont-contact-add"></i>Nouveau bénéficiare</a>
                                
                            </li>
                            
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content card-block w-100" id="activ">
                            
                            <div class="tab-pane active" id="agent" role="tabpanel">
                            <!--Recherche-->
                                <div class="w-100 row mx-auto">
                                    <div class="pcoded-search col-sm-4 p-0">
                                        <div class="pcoded-search-box m-0 ">
                                        <form action="{{ route('agents.chercher') }}" method="post">
                                            @csrf 
                                                <div class="form-group">
                                                    <!--Projets_id-->
                                                    <input type="hidden" name="projets_id" value="{{ $projet->id }}">
                                                    <input type="text" name="agents_chercher" placeholder="Rechercher" required>
                                                    <button type="submit" class="search-icon"><i class="ti-search"></i></button>
                                                </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>

                            <!--bénéficiaires-->
                                <div class="col-md-12 col-lg-12 p-0 rounded bordered  table-responsive">
                                    
                                    <table class="table table-hover mb-4">
                                        <thead  class="bg-gray">
                                            <tr>
                                                <th>Nom(s)</th>
                                                <th>Prénom(s)</th>
                                                <th>Fonction</th>
                                                <th class="text-center">Activité</th>
                                                <th class="text-center th-l-bordered" > Intervenir</th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($agentS as $agent)
                                            <tr>
                                                <td>{{ $agent->nom }}</td>
                                                <td>{{ $agent->prenom }}</td>
                                                <td>{{ $agent->fonction }}</td>
                                                
                                                <!--Permet de voir la liste des activités dans lesquelles l'agent est engagé -->
                                                <td class="text-center">
                                                    <a href="{{ route('activites.liste',['projets_id'=>$projet->id,'agents_id'=> $agent->id]) }}" class="btn btn-sm  btn-outline-primary">Voir <span class="badge badge-primary">{{ $agent->activites_count }}</span></a>
                                                </td>
                                                <td class="text-center">
                                                @if($agent->verifications_count == 0)
                                                    <!--Outils suppreion, modification-->
                                                    <a href="{{ route('agents.verifier',['projets_id'=> $projet->id,'agents_id'=> $agent->id]) }}" class="btn btn-sm btn-outline-danger">Vérifier</a>                                               
                                                @else
                                                    <a href="#" class="btn btn-sm btn-outline-danger">Révérifier</a>
                                                @endif
                                                </td>
                                            </tr>
                                            
                                            <?php $i++; ?>

                                            @endforeach
                                        </tbody>
                                    </table>

                                    <!--Pagination-->
                                    <div class="d-flex justify-content-center pagination-sm">
                                        {!!$agentS->links('pagination::bootstrap-4')!!}
                                    </div>
                                </div>
    
                            </div>
                            
                            <!--Manipulation-->
                            <div class="tab-pane" id="manipulation" role="tabpanel">

                                <div class="col-md-12 col-lg-12 p-0 rounded bordered  mt-2 table-responsive">
                                    <form action="" method="post">
                                        @csrf 
                                        @method('DELETE')
                                    <div class="w-100 pb-2">
                                        <button formaction="{{ route('agents.supprimerTout') }}" type="submit" class="btn btn-outline-danger">Supprimer tout</button>
                                    </div>
                                    
                                    <table class="table table-hover mb-4">
                                        <thead  class="bg-gray">
                                            <tr>
                                                <th><input type="checkbox" class="selectall" id=""></th>
                                                <th>Nom(s)</th>
                                                <th>Prénom(s)</th>
                                                <th>Fonction</th>
                                                <th class="text-center">Equipe</th>
                                                <th class="text-center th-l-bordered" ></th>
                                                
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($agentS as $agent)
                                            <tr>
                                                <td><input type="checkbox" name="ids[]" class="selectbox" value="{{ $agent->id }}"></td>
                                                <td>{{ $agent->nom }}</td>
                                                <td>{{ $agent->prenom }}</td>
                                                <td>{{ $agent->fonction }}</td>
                                                <td class="text-center">N° {{ $agent->num_equipe }}</td>

                                                <!--Suppresion et modification-->
                                                <td  class="text-center">
                                                    
                                                        <a href="{{ route('agents.edit',$agent->id) }}" class="btn btn-sm btn-outline-primary pr-0"><i class="icofont icofont-ui-edit m-0"></i></a>
                                                    
                                                        <a href="{{route('agents.supprimer',$agent->id) }}" onclick="return confirm('Attention, cet action sera irréversible !')" class="btn btn-sm btn-outline-danger pr-0">
                                                            <i class="icofont icofont-trash m-0"></i>
                                                        </a>
                                                    
                                                </td>
                                            </tr>
                                            
                                            <?php $i++; ?>

                                            @endforeach
                                        </tbody>
                                    </table>
                                    <!--Pagination-->
                                    <div class="d-flex justify-content-center pagination-sm">
                                        {!!$agentS->links('pagination::bootstrap-4')!!}
                                    </div>
                                </div>
                                </form>
                            </div>
                            <!--Onglet ajout-->
                            <div class="tab-pane" id="nouveau" role="tabpanel">
                                 
                                <form action="{{ route('agents.forge',$projet->id) }}" method="post" class="pt-0 p-4">
                                    @csrf 
                                    @method('GET')
                                    <!--projets_id-->
                                    <input type="hidden" name="projets_id" value="{{ $projet->id }}">
                                    
                                    <div id="bloc" class="p-3 mt-4 pb-2">

                        
                                                                                                    
                                        <div class="form-row bg-personnel-ws w-100 mx-auto "  id="formulaire">

                                            <div class="w-100 p-0"> 
                                                <i class="icofont icofont-ui-close btn btn-sm btn-square btn-outline-danger  float-end btn-x-ws mb-1" id="remove"></i>
                                                
                                            </div>
                                            
                                                <!--Bloc gauche-->
                                                <div class="col-lg-8 col-xs-4 col-md-6 col-sm-10 mx-auto">

                                                    <!--Noms-->
                                                    <div class="input-group">
                                                        
                                                        <input type="text" name="nom[]"  class="form-control form-txt-primary " placeholder="Noms" required>
                                                    </div>
                                                
                                            
                                                    <!--Prénoms-->
                                                    <div class="input-group">
                                                        
                                                        <input type="text" name="prenom[]"  class="form-control form-txt-primary " placeholder="Prénoms">
                                                    </div>

                                                    <!--Fonction-->
                                                    <div class="input-group">
                                                        
                                                        <input type="text" name="fonction[]"  class="form-control form-txt-primary " placeholder="Fonction" required>
                                                    </div>
                                                </div>
                                            
                                                <!--Bloc droite-->
                                                <div class="col-lg-4 col-xs-4 col-md-6 col-sm-10 mx-auto">

                                                    <!--Numéro Equipe-->
                                                    <div class="input-group">
                                                        
                                                        <input type="text" name="num_equipe[]"  class="form-control form-txt-primary " placeholder="Equipe" required>
                                                    </div>
                                            
                                                    <!--Adresse-->
                                                    <div class="input-group">
                                                        
                                                        <input type="text" name="adresse[]"  class="form-control form-txt-primary " placeholder="Adresse" required>
                                                    </div>

                                                    <!--Téléphone-->
                                                    <div class="input-group">
                        
                                                        <input type="text" name="telephone[]"  class="form-control form-txt-primary " placeholder="Téléphone" required>
                                                    </div>
                                                </div>    
                                        </div>
                                    </div>
                                    
                                    <!--Boutons-->
                                    <div class="p-3 pt-2 w-100 mx-auto"> 
                                        <i class="ti-plus col-sx-12 col-sm-5 col-md-4 col-lg-4 col-xl-3 mt-1 float-start btn btn-outline-primary" id="addRow"> Zone de saisie</i>
                                        
                                        <button type="submit"  class="col-sx-12 col-sm-5 col-md-4 col-lg-4 col-xl-3 mt-1 btn btn-outline-danger float-end">
                                            <i class="ti-save-alt"> Soumettre</i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Row end -->
            </div>
        </div>
        <script>
            $('.selectall').click(function(){
                $('.selectbox').prop('checked',$(this).prop('checked'));
                $('.selectall2').prop('checked',$(this).prop('checked'));
            })
            $('.selectall2').click(function(){
                $('.selectbox').prop('checked',$(this).prop('checked'));
                $('.selectall').prop('checked',$(this).prop('checked'));
            })
            $('.selectbox').change(function(){
                var total = $('.selectbox').length;
                if(total == number){
                    $('.selectbox').prop('checked',true);
                    $('.selectall2').prop('checked',true);
                }else{
                    $('.selectbox').prop('checked',false);
                    $('.selectall2').prop('checked',false);
                }
            })
        </script>

</x-app-layout>