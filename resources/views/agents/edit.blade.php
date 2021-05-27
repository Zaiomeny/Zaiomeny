<x-app-layout>

    <div class="w-100">
        <div class="w-100 mt-4">
            <h5 class="text-center text-muted">MODIFICATION EN COURS</h5>
        </div>
        <hr>
        @foreach($agentS as $agent)
        <form action="{{ route('agents.update',$agent->id) }}" method="post">
        
        @csrf 
        @method('PUT')

            <div class="w-100 row mx-auto mt-2 p-4">
            
                <div class="col-sm-6 col-md-6 ">
                
                <!--Nom-->
                    <div class="form-group">
                        <label for="nom">Nom :</label>
                        <input type="text" name="nom" class="form-control bg-none" value="{{ $agent->nom }}" required>
                    </div>

                <!--Prénom-->
                    <div class="form-group">
                        <label for="prenom">Prénom :</label>
                        <input type="text" name="prenom" class="form-control bg-none" value="{{ $agent->prenom }}">
                    </div>

                <!--Fonction-->
                    <div class="form-group">
                        <label for="fonction">Fonction :</label>
                        <input type="text" name="fonction" class="form-control bg-none" value="{{ $agent->fonction }}" required>
                    </div>
                </div>


                <div class="col-sm-6 col-md-6 ">

                <!--Numéro équipe-->
                    <div class="form-group">
                        <label for="num_equipe">Equipe n° :</label>
                        <input type="text" name="num_equipe" class="form-control bg-none" value="{{ $agent->num_equipe }}" required>
                    </div>

                <!--Adresse-->
                    <div class="form-group">
                        <label for="adresse">Adresse :</label>
                        <input type="text" name="adresse" class="form-control bg-none" value="{{ $agent->adresse }}" required>
                    </div>

                <!--Téléphone-->
                    <div class="form-group">
                        <label for="telephone">Téléphone :</label>
                        <input type="text" name="telephone" class="form-control bg-none" value="{{ $agent->telephone }}" required>
                    </div>
                </div>

                <!--Id projet-->
                <input type="hidden" name="projets_id" value="{{ $agent->projets_id }}">
                
                <!--Bouton de soumission-->
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-danger">
                        <i class="ti-reload"></i> Modifier
                    </button>
                </div>
                
            </div>
        </form>
        @endforeach
    </div>
 
</x-app-lyout>