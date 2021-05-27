<x-app-layout>
    <div class="w-100">
        <a href="{{ route('projets.index') }}" class="btn btn-sm btn-outline-primary float-end">Retour <i class="ti-angle-double-left"></i></a>
    </div>

    <div class="col-md-6 col-lg-6 col-xl-4  mt-2  bg-none p-3">
        <div>
            <h5 class="text-left text-muted">Modification</h5>
        </div>
        <br>
        <form action="{{ route('projets.update',$projet->id) }}" method="post">
            @csrf 
            @method('PUT')
            
            <!--Numéro BR-->
            <div class="form-group">
                <input type="text" name="num_br" class="form-control bg-none" placeholder="Numéro BR" value="{{ $projet->num_br }}" required>
            </div>
            
            <!--Nominalisation du br-->
            <div class="form-group">
                <input type="text" name="nom" class="form-control bg-none" placeholder="Libéllé du BR" value="{{ $projet->nom }}" required>
            </div>
            
            <!--L'année du lancement du br-->
            <div class="form-group">
                <input type="text" class="form-control bg-none" name="date" value="{{ $projet->date }}" placeholder="Date du début du BR"  required>
            </div>
            
            <!--Bouton de soumission-->
            <div class="form-group p-1">
                <button type="submit" class="btn btn-sm btn-outline-danger"><i class="ti-reload"> Modifier</i></button>
            </div>
        </form>
    </div>
</x-app-layout>