@extends('activites.layout')
@section('content')
<div class="row">
    <div class="col-md-6 mx-auto p-4 shadow-lg rounded bordered">
        <h5 class="text-center text-info">Nouvel agent</h5>
        <hr>
        <form action="{{ route('agents.store') }}" method="post">
            @csrf 
            <div class="form-group">
                <label for="nom">Nom</label>
                <input type="text" name="nom"  class="form-control" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom</label>
                <input type="text" name="prenom"  class="form-control">
            </div>
            <div class="form-group">
                <label for="adresse">Adresse</label>
                <input type="text" name="adresse"  class="form-control" required>
            </div>
            <div class="form-group">
                <label for="telephone">Téléphone</label>
                <input type="text" name="telephone"  class="form-control" required>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-outline-primary mt-2 float-end">Créer</button>
            </div>
        </form>
    </div>
</div>
@endsection