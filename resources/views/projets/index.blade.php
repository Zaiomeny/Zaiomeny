<x-app-layout>
        
        <div class="w-100 mx-auto mt-2 pb-2">
            <h6 class="float-start">Tout les BRs</h6>
            <a href="{{ route('projets.create') }}" class="btn btn-sm  btn-outline-primary  float-end"><i class="icofont icofont-plus"></i> Nouveau projet </a>
        </div>

        <!--Recherche-->
        <div class="w-100 row mx-auto">
            <div class="pcoded-search col-sm-4 p-0">
                <span class="searchbar-toggle">  </span>
                <div class="pcoded-search-box ">
                <form action="{{ route('projets.chercher') }}" method="post">
                    @csrf 
                        <div class="form-group">
                            <input type="text" name="projets_chercher" placeholder="Rechercher" required>
                            <button type="submit" class="search-icon"><i class="ti-search"></i></button>
                        </div>
                </form>
                </div>
            </div>
        </div>

    <div class="col-md-12 col-lg-12 mt-2 table-responsive">
        
        <table class="table table-hover">
                    <thead class="bg-gray">
                        <tr>
                            <th class="th-r-bordered">N° BR</th>
                            <th class="th-r-l-bordered">Libéllé</th>
                            <th class="th-l-r-bordered">Année</th> 
                            <th class="text-center">Bénéficiaires</th>
                            <th class="th-l-bordered text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projetS as $projet)
                        <tr>
                            <td>{{ $projet->num_br }}</td>
                            <td>{{ $projet->nom }}</td>
                            <td>{{ $projet->date }}</td>
                            <td class="text-center">
                                <!--Liste de bénéficiaires-->
                                <a href="{{ route('projets.list',$projet->id) }}" class="btn btn-sm  btn-outline-primary"> 
                                    Liste <span class="badge badge-primary">{{ $projet->agents_count }}</span>
                                </a>
                            </td>
                               
                            
                            <td class="text-center">
                                <form action="{{ route('projets.destroy',$projet->id) }}" method="post"> 

                                     <!--Basculer vers l'état-->
                                    <a href="{{ route('projets.etat',$projet->id) }}" class="btn btn-sm  btn-outline-danger">
                                        <i class="icofont icofont-open-eye"> Etat</i>
                                    </a>
                                    
                                    <!--Page de modification-->
                                    <a href="{{ route('projets.edit',$projet->id) }}" class="btn btn-sm  btn-outline-primary"><i class="icofont icofont-ui-edit m-0"></i></a>
                                    
                                    <!--Supprimer le BR-->
                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('La suppression sera irréversible !')" class="btn btn-sm btn-outline-danger"><i class="icofont icofont-trash m-0"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
        </table>

        <!--pagination-->
        <div class="d-flex justify-content-center pagination-sm">
            {!!$projetS->links('pagination::bootstrap-4')!!}
        </div>
    </div>
</x-app-layout>