<x-app-layout>
    <div class="w-100">
        <a href="/projets" class="btn btn-sm btn-outline-primary float-end">Retour <i class="ti-angle-double-left"></i></a>
    </div>
    <div class="col-md-6 col-lg-6 col-xl-4  mt-2  p-3">
   
        <div>
            <h5 class="text-left text-muted pb-2">Nouveau BR</h5>
        </div>

        <form action="{{ route('projets.store') }}" method="post">
            @csrf 
            
            <!--Numéro BR-->
            <div class="form-group">
                <input type="text" name="num_br" class="form-control bg-none" placeholder="Numéro BR" required>
            </div>
            
            <!--Nominalisation du br-->
            <div class="form-group">
                <input type="text" name="nom" class="form-control bg-none" placeholder="Libéllé du BR" required>
            </div>
            
            <!--L'année du lancement du br-->
            <input type="date" name="date" class="form-control bg-none" placeholder="Date du début du BR" required>
            
            <!--Bouton de soumission-->
            <div class="form-group pt-3">
                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="ti-save-alt"> Soumettre</i></button>
            </div>
        </form>
    </div>
</x-app-layout>