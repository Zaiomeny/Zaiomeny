<x-app-layout>
    <div class="col-md-6 col-lg-6 col-xl-4 mx-auto mt-2 rounded bg-white border border-primary shadow-md p-3">
        <div>
            <h5 class="text-left">Nouveau BR</h5>
        </div>
        <br>
        <form action="{{ route('projets.store') }}" method="post">
            @csrf 
            <!--Numéro BR-->
            <div class="form-group">
                <input type="text" name="num_br" class="form-control" placeholder="Numéro BR" required>
            </div>
            <!--Nominalisation du br-->
            <div class="form-group">
                <input type="text" name="nom" class="form-control" placeholder="Libéllé du BR" required>
            </div>
            <!--L'année du lancement du br, ce sera l'année générer par le système-->
            <input type="hidden" name="date" value="{{ date('Y') }}">
            <!--Bouton de soumission-->
            <div class="form-group p-1">
                <button type="submit" class="text-white btn btn-sm btn-out btn-square btn-grd-primary float-end"><i class="ti-save-alt"> Soumettre</i></button>
            </div>
        </form>
    </div>
</x-app-layout>