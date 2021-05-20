<x-app-layout>


<div class="row">
        <div class="col-md-12 mx-auto mt-2 p-4  bordered">
        <div class="float-start d-flex justify-content-center">
            <span> <a href="{{ route('agents.create') }}" class="btn btn-outline-success">Nouvel agent</a></span>
            <span class="mx-2"> <a href="{{ route('activites.create') }}" class="btn btn-outline-success">Nouvelle activité</a></span>
        </div>
            <a href="{{ route('brs.create') }}" class="btn btn-outline-primary mx-2 float-end">Nouveau virement</a>
            <hr>
            <h5 class="text-dark ml-0 mt-4"> <u>Listes des activités</u> :</h5>
            <table class="table table-striped table-borderless mt-2">
                <thead>
                    <tr>
                        <th>Numéro BR</th>
                        <th>Activité</th>
                        <th class="text-center" colspan="2">Zone de vérification</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($activiteS as $activite) 
                    <tr>
                        <td></td>
                        <td>{{ $activite->nom }}</td>
                        <td> <a href="{{ route('activites.details',$activite->id) }}" class="btn btn-outline-success m-0">Détails</a> </td>
                        <td> <a href="{{ route('activites.etat',$activite->id) }}" class="btn btn-outline-primary m-0">Etat</a> </td>

                    </tr>
                @endforeach

                </tbody>
            </table>
            
        </div>
    </div>

</x-app-layout>