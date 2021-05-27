<x-app-layout>

<div class="card mb-0 shadow-none borderless">
        <div class="card-header">
            
            <div class="d-inline-block">
                <h6>CGP/UCGAI/INSTAT</h6>
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

                <!--A propos du br-->
                <div class="col-6 b-r-default">                 
                    <h5>N° BR : {{ $projet->num_br }}-{{ $projet->nom }}</h5>
                    <p class="text-muted">Année : {{ $projet->date }}</p>
                </div>

                
                <!--A propos du bénéficiaire-->
                <div class="col-6">
                    @foreach ($agentS as $agent)
                        <h5>Bénéficiaire : {{ $agent->nom }} {{ $agent->prenom }}</h5>
                        <p class="text-muted"> Fonction : {{ $agent->fonction }} / Contact : {{ $agent->telephone }}</p>
                    @endforeach
                </div>

            </div>
        </div>
           
    </div>
    

  <!--Liste des activités-->

    <div class="w-100 mt-4 bg-white pt-4">
        
        <!-- Nav tabs -->
        <ul class="nav nav-tabs  tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" data-toggle="tab" href="#liste" role="tab" aria-expanded="true">Liste des activités</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#nouvel_activite" role="tab" aria-expanded="false">Nouvel activité</a>
            </li>
        </ul>
        <!--Liste d'activités--> 
        <div class="tab-content tabs card-block">
            <div class="tab-pane active" id="liste" role="tabpanel" aria-expanded="true">
            
            <div class="w-100">
               
                    <a href="{{ route('agents.verifier',['projets_id'=> $projet->id,'agents_id'=> $agent->id]) }}" class="btn btn-sm  btn-square btn-outline-primary float-end mb-2"><i class="icofont icofont-law-alt-3"></i> Vérifier</a>
                
            </div>
               

            <div class="w-100 table-responsive">
                
                <table class="table">
                    <thead class="bg-ws">
                        <tr>
                            <th>#</th>
                            <th>Nomination</th>
                            <th class="text-center"><i class="icofont icofont-money"></i> Montant</th>
                            <th class="text-center">Date de virement</th>
                            <th class="text-center"><i class="icofont icofont-safety-pin"></i> Controls </th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php $j = 1; ?>
                        @foreach($activiteS as $activite)
                        
                            @if($activite->agents_id == $agent->id)
                            <tr>
                                <td>{{ $j++ }}</td>
                                <td>{{ $activite->nom }}</td>
                                <td class="text-center">{{ $activite->montant }} Ar</td>
                                <td class="text-center">{{ $activite->date_de_virement }}</td>
                                <td class="text-center">
                                    <form action="{{ route('activites.destroy',$activite->id) }}" method="post">
                                        <a href="{{ route('activites.modifier',[ 'projets_id' => $projet->id,'agents_id'=>$agent->id,'activites_id' => $activite->id ]) }}" class="btn btn-sm btn-outline-primary">
                                            <i class="icofont icofont-ui-edit"></i>
                                        </a>

                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Cet action sera irreversible, voulez-vous continuer ?')" type="submit" class="btn btn-sm btn-outline-danger">
                                            <i class="icofont icofont-trash"></i>
                                        </button>
                                    </form>    
                                </td>
                            </tr>

                            @endif   
                        @endforeach           
                    </tbody>
                </table>
            </div>
        </div>

        <!--Nouvel activité-->
        <div class="tab-pane" id="nouvel_activite" role="tabpanel" aria-expanded="false">
           
            <form action="{{ route('activites.store') }}" method="post">
                @csrf 
                <div class="container p-2 pb-1">    
                    <!--projets_id-->
                    <input type="hidden" name="projets_id" value="{{ $projet->id }}">
                    
                    <!--agents_id-->
                    <input type="hidden" name="agents_id" value="{{ $agent->id }}">
                        
                    <div class="corp mx-auto  table-responsive">
                        <table class="table table-bordered">
                            <thead class="bg-ws">
                                <tr>
                                    <th> Libéllé d' activité</th>
                                    <th> Montant brut</th>
                                    <th> Date de virement </th>

                                    <!--Ajouter une zone de saisie-->
                                    <th class="text-center">
                                        <i class="icofont icofont-plus btn btn-sm btn-square btn-outline-primary" id="ajouterligne"></i>
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="tbody">
                                <tr>

                                    <!--nom de l' activité-->
                                    <td class="p-1">
                                        <input type="text" name="nom[]" class="form-control" required>
                                    </td>
                                    
                                    <!--Montant-->
                                    <td class="p-1">
                                        <input type="text" name="montant[]" class="form-control" required>
                                    </td>

                                    <!--Date de virement-->
                                    <td class="p-1">
                                        <input type="date" name="date_de_virement[]" class="form-control" required>
                                    </td>

                                    <!--Supprimer cette ligne de zones de saisie-->
                                    <td class="text-center">
                                        <i class="icofont icofont-ui-close btn btn-sm btn-square btn-outline-info" id="supprimerligne"></i>
                                    </td>
                                </tr>
                            </tbody>
                            
                                        
                        </table>
                    </div> 

                    <div class="w-100 mx-auto">
                        <!--Bouton de soumission-->
                        <button type="submit" class="float-end btn btn-sm btn-outline-danger mb-2">Soumettre</button>
                                
                    </div>  
                </div>
                
            </form>


        </div>
    </div>
</div>

</x-app-layout>