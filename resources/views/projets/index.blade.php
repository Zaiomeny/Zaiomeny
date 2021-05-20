<x-app-layout>
    <div class="col-md-12 col-lg-12  rounded bordered  mt-2">
        <div>
            <h6 class="float-start">Tout les BRs</h6>
            <a href="{{ route('projets.create') }}" class="text-white btn btn-sm btn-out btn-square btn-grd-primary mb-2 float-end"><i class="icofont icofont-plus"></i> Nouveau projet </a>
        </div>
        <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="th-r-bordered">N° BR</th>
                            <th class="th-r-l-bordered">Libéllé</th>
                            <th class="th-l-r-bordered">Année</th> 
                            <th class="th-l-bordered text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($projetS as $projet)
                        <tr>
                            <td>{{ $projet->num_br }}</td>
                            <td>{{ $projet->nom }}</td>
                            <td>{{ $projet->date }}</td>
                            <td class="text-center">
                                <form action="{{ route('projets.destroy',$projet->id) }}" method="post"> 
                                    <a href="{{ route('projets.list',$projet->id) }}" class="btn btn-sm btn-square btn-outline-primary"><i class="icofont icofont-worker-group"></i> Bénéficiaires</a>
                                    <a href="{{ route('projets.etat',$projet->id) }}" class="btn btn-sm btn-square btn-outline-danger"><i class="icofont icofont-open-eye"> Etat</i></a>
                                    <a href="{{ route('projets.edit',$projet->id) }}" class="btn btn-sm btn-square btn-outline-primary"><i class="icofont icofont-ui-edit"></i></a>
                                    

                                    @csrf 
                                    @method('DELETE')
                                    <button type="submit" onclick="return confirm('La suppression sera irréversible !')" class="btn btn-sm btn-square btn-outline-danger"><i class="icofont icofont-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
        </table>
    </div>
</x-app-layout>