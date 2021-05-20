<x-app-layout>

    <div class="card mx-auto h-25">
        <div class="card-header">
            <h3 class="text-center">MODIFICATION EN COURS</h3>
        </div>
        <hr>
        <div class="card-block col-lg-6 col-md-8 col-sm-8 col-xs-12 mx-auto shadow-sm p-4">
        @foreach($agentS as $agent)
            <form action="{{ route('agents.update',$agent->id) }}" method="post">
            
            @csrf 
            @method('PUT')
            <!--Nom-->
                <div class="form-group">
                    <label for="nom[]">Nom :</label>
                    <input type="text" name="nom[]" class="form-control" value="{{ $agent->nom }}" required>
                </div>
            <!--Prénom-->
                <div class="form-group">
                    <label for="prenom[]">Prénom :</label>
                    <input type="text" name="prenom[]" class="form-control" value="{{ $agent->prenom }}">
                </div>
            <!--Fonction-->
                <div class="form-group">
                    <label for="fonction[]">Fonction :</label>
                    <input type="text" name="fonction[]" class="form-control" value="{{ $agent->fonction }}" required>
                </div>
            <!--Numéro équipe-->
                <div class="form-group">
                    <label for="num_equipe[]">Equipe n° :</label>
                    <input type="text" name="num_equipe[]" class="form-control" value="{{ $agent->num_equipe }}" required>
                </div>
            <!--Adresse-->
                <div class="form-group">
                    <label for="adresse[]">Adresse :</label>
                    <input type="text" name="adresse[]" class="form-control" value="{{ $agent->adresse }}" required>
                </div>
            <!--Téléphone-->
                <div class="form-group">
                    <label for="telephone[]">Téléphone :</label>
                    <input type="text" name="telephone[]" class="form-control" value="{{ $agent->telephone }}" required>
                </div>
            <!--Id projet-->
                <input type="hidden" name="projet_id" value="{{ $agent->projet_id }}">
            <!--Bouton de soumission-->
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-primary float-end">Modifier</button>
                </div>
            </form>
            
        @endforeach
        </div>
    </div>
 
</x-app-lyout>