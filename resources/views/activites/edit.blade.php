<x-app-layout>
    <div class="w-100">
        <div class="w-100 mt-4 row mx-auto pt-4">
            <h5 class="text-center text-muted">MODIFICATION EN COURS</h5>
        </div>
        <hr>
        @foreach($activiteS as $activite)
        <form action="{{ route('activites.mettre_a_jour',[ 'projets_id' => $projets_id,'agents_id'=>$agents_id,'activites_id' => $activite->id ]) }}" method="get" class="pt-0 p-4">
        
        <div class="col-xs-12 col-sm-10 col-md-8 col-lg-7 col-xl-5">
        
                <!--projets_id (BR)-->
                <input type="hidden" name="projets_id" value="{{ $projets_id }}">

                <!--agents_id (Bénéficiaire)-->
                <input type="hidden" name="agents_id" value="{{ $agents_id }}">

                <!--Noms-->
                <div class="input-group">
                    <input type="text" name="nom"  class="form-control form-txt-primary form-control-bold bg-none" value="{{ $activite->nom }}" required>
                </div>
                   
                <!--Prénoms-->
                <div class="input-group">
                    <input type="text" name="montant"  class="form-control form-txt-primary form-control-bold bg-none" value="{{ $activite->montant }}">
                </div>
                
                <!--Fonction-->
                <div class="input-group">
                    <input type="date" name="date_de_virement"  class="form-control form-txt-primary form-control-bold bg-none" value="{{ $activite->date_de_virement }}" required>
                </div>

                <!--Bouton de soumission-->
                <div class="form-group pt-2">
                    <button type="submit"  class=" btn btn-outline-danger">
                        <i class="ti-save-alt"> Modifier</i>
                    </button>
                </div>
            
            </div>
        </form>
        @endforeach
        
    </div>
</x-app-layout>