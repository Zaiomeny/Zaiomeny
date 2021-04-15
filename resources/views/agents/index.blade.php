@extends('activites.layout')
@section('content')
<div class="row">
    <div class="col-md-8 mx-auto px-4 rounded bordered  mt-2">
    <a href="{{ route('agents.create') }}" class="btn btn-outline-primary mb-2 float-end">Nouvel agent</a>
    <hr>
        <table class="table table-striped table-borderless">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Adresse</th>
                    <th>Téléphone</th>
                    <th class="text-center">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($agentS as $agent)
                <tr>
                    <td>{{ $agent->nom }}</td>
                    <td>{{ $agent->prenom }}</td>
                    <td>{{ $agent->adresse }}</td>
                    <td>{{ $agent->telephone }}</td>
                    <td>
                        <form action="{{ route('agents.destroy',$agent->id) }}" method="post">
                            <a href="{{ route('agents.show',$agent->id) }}" class="btn btn-outline-success p-1 m-0">Vérifier</a>
                            @csrf 
                            @method('DELETE')
                            <button onclick="return confirm('Voulez-vous le supprimer ?')" type="submit" class="btn btn-outline-danger float-end p-1 m-0">Supprimer</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection