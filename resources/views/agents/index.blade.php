<x-app-layout>
    
 
            <div class="col-md-12 col-lg-12  rounded bordered  mt-2">
                <div>
                    <a href="{{ route('agents.create') }}" class="btn btn-primary mb-2 float-end">Nouvel agent</a>
                </div>
            
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th class="text-white th-grd-primary th-r-bordered">Nom</th>
                            <th class="text-white th-grd-primary th-l-r-bordered">Prénom</th>
                            <th class="text-white th-grd-primary th-l-r-bordered">Adresse</th>
                            <th class="text-white th-grd-primary th-l-r-bordered">Téléphone</th>
                            <th class="text-white th-grd-primary th-l-bordered text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($agentS as $agent)
                        <tr class="blue-colors">
                            <td>{{ $agent->nom }}</td>
                            <td>{{ $agent->prenom }}</td>
                            <td>{{ $agent->adresse }}</td>
                            <td >{{ $agent->telephone }}</td>
                            <td class="text-center">
                                <form action="{{ route('agents.destroy',$agent->id) }}" method="post">
                                    <a href="{{ route('agents.show',$agent->id) }}" class="btn-primary btn-mini waves-effect waves-light"> 
                                        <i class="icofont icofont-eye-alt"> Vérifier</i> 
                                    </a>
                                    @csrf 
                                    @method('DELETE')
                                    <button onclick="return confirm('Voulez-vous le supprimer ?')" type="submit" class="m-l-5 btn-danger btn-mini waves-effect waves-light">
                                        <i class="icofont icofont-warning-alt"> Supprimer</i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        
                        @endforeach
                    </tbody>
                </table>
</div>


</x-app-layout>
