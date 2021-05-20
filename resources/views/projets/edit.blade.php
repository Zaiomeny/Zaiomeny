<x-app-layout>
    <div class="col-md-6 col-lg-6 col-xl-4 mx-auto mt-2 rounded bg-white border border-primary shadow-md p-3">
        <div>
            <h5 class="text-left">Nouveau BR</h5>
        </div>
        <br>
        <form action="{{ route('projets.update',$projet->id) }}" method="post">
            @csrf 
            @method('PUT')
            <!--Numéro BR-->
            <div class="form-group">
                <input type="text" name="num_br" class="form-control" placeholder="Numéro BR" value="{{ $projet->num_br }}" required>
            </div>
            <!--Nominalisation du br-->
            <div class="form-group">
                <input type="text" name="nom" class="form-control" placeholder="Libéllé du BR" value="{{ $projet->nom }}" required>
            </div>
            <!--L'année du lancement du br, ce sera l'année générer par le système-->
            <div class="form-group">
                <input type="text" class="form-control" name="date" value="{{ $projet->date }}" placeholder="Année" maxlength="4" required>
            </div>
            <!--Bouton de soumission-->
            <div class="form-group p-1">
                <button type="submit" class="text-white btn btn-sm btn-out btn-square btn-grd-primary float-end"><i class="ti-save-alt"> Soumettre</i></button>
            </div>
        </form>
    </div>
</x-app-layout>