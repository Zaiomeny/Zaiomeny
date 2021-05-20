<x-app-layout>

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

  <!--Liste des activités-->

    <div class="w-100 bg-white pt-4">
        
        <!-- Nav tabs -->
        <ul class="nav nav-tabs  tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#liste" role="tab" aria-expanded="true">Liste</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#nouvel_activite" role="tab" aria-expanded="false">Nouvel activité</a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content tabs card-block">
            <div class="tab-pane active" id="liste" role="tabpanel" aria-expanded="true">
            <!--Liste-->    

                <div class="w-100">
                    <table class="table">
                        <thead class="bg-ws">
                            <tr>
                                <th>#</th>
                                <th>Activité</th>
                                <th class="text-center"><i class="icofont icofont-money"></i> Montant</th>
                                <th class="text-center">Date de virement</th>
                                
                                <th class="text-center"><i class="icofont icofont-safety-pin"></i> Control </th>
                                <th>
                                        @foreach($projetS as $projet)
                                            <a href="{{ route('agents.verifier',['projet_id'=> $projet->id,'agent_id'=> $agent->id]) }}" class="text-white btn btn-sm btn-grd-primary btn-square btn-out text-center float-end"><i class="icofont icofont-law-alt-3"></i> Vérifier</a>
                                        @endforeach
                                    
                                </th>

                                </tr>
                        </thead>
                        <tbody>
                        <?php $j = 1; ?>
                            @foreach($activiteS as $activite)
                            
                                @if($activite->agent_id == $agent->id)
                                <tr>
                                    <td>{{ $j++ }}</td>
                                    <td>{{ $activite->nom }}</td>
                                    <td class="text-center">{{ $activite->montant }} Ar</td>
                                    <td class="text-center">{{ $activite->date_de_virement }}</td>
                                    <td class="text-center">
                                        <form action="{{ route('activites.destroy',$activite->id) }}" method="post">
                                            <a href="{{ route('activites.edit',$activite->id) }}" class="btn btn-sm btn-square btn-outline-primary"><i class="icofont icofont-ui-edit"></i> Modifier</a>
                                            @csrf
                                            @method('DELETE')
                                            <button onclick="return confirm('Cet action sera irreversible, voulez-vous continuer ?')" type="submit" class="btn btn-sm btn-square btn-outline-danger"><i class="icofont icofont-mop"></i> Supprimer</button>
                                        
                                        </form>
                                    
                                    
                                    </td>
                                    <td></td>
                                </tr>
                            
                                
                                
                                @endif
                                
                                
                            @endforeach
                                
                                        
                        </tbody>
                    </table>
                </div>


            </div>
            <div class="tab-pane" id="nouvel_activite" role="tabpanel" aria-expanded="false">
            <!--Nouvel activité-->

                <div class="container p-2">    
                    <form action="{{ route('activites.store') }}" method="post">
                        @csrf 
            
                        <div class="entete mb-2">
                            <!--projet_id-->
                            @foreach($projetS as $projet)
                                <input type="hidden" name="projet_id" value="{{ $projet->id }}">
                            @endforeach
                        <!--agent_id-->
                            @foreach($agentS as $agent)
                                <input type="hidden" name="agent_id" value="{{ $agent->id }}">
                            @endforeach
                            
                        </div> 
                        
                        <div class="corp">
                            <table class="table table-bordered">
                                <thead class="bg-ws">
                                    <tr>
                                        <th> Libéllé </th>
                                        <th> Montant réçu </th>
                                        <th class="text-right"> Date de virement </th>
                                        <th class="text-center">
                                        <i class="icofont icofont-plus btn btn-sm btn-square btn-outline-primary" id="ajouterligne"></i>
                                            
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="tbody">
                                    <tr>
                                        <td class="p-1">
                                            <!--nom de l' activité-->
                                            <input type="text" name="nom[]" class="form-control" required>
                                        </td>
                                        <td class="p-1">
                                            <!--Montant-->
                                            <input type="text" name="montant[]" class="form-control" required>
                                        </td>
                                        <td class="p-1">
                                            <!--Date de virement-->
                                            <input type="date" name="date_de_virement[]" class="form-control" required>
                                        </td>
                                        <td class="text-center">
                                            <i class="icofont icofont-ui-close btn btn-sm btn-square btn-outline-info" id="supprimerligne"></i>
                                        </td>
                                    </tr>
                                </tbody>
                               
                                            
                            </table>
                        </div>   
                        <div class="w-100 mt-2">
                            <!--Bouton de soumission-->
                            <button type="submit" class="text-white float-end btn btn-out btn-square btn-grd-primary">Soumettre</button>
                                       
                        </div>                                 
                    </form>
                    
                </div>


            </div>
        </div>
    </div>




</x-app-layout>