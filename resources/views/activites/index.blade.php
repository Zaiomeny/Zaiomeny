@extends('activites.layout')
@section('content')
    <div class="row">
        <div class="col-md-8 mx-auto p-4 mt-2 bordered rounded shadow-lg">
            <a href="{{ route('activites.create') }}" class="btn btn-outline-primary mb-2 float-end">Nouvel activité</a>
            <table class="table table-striped table-borderless">
                <thead>
                    <tr>
                        <th>BR</th>
                        <th>Nom</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($activiteS as $activite)
                    <tr>
                        <td>{{ $activite->num_br }}</td>
                        <td>{{ $activite->nom }}</td>
                        <td class="text-center">
                            <form action="{{ route('activites.destroy',$activite->id) }}" method="post">
                                
                                <a href="{{ route('activites.edit' ,$activite->id) }}" class="btn btn-outline-success p-1">Modifier</a>
                                @csrf
                                @method('DELETE')
                                <button  onclick="return confirm('Vous allez le supprimer définitivement, vous en êtes sûr(es) ?') " type="submit" class="btn btn-outline-danger p-1">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection