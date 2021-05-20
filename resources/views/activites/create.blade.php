<x-app-layout>
<div class="row">
    <div class="col-md-6 mx-auto p-4">
        <form action="{{ route('activites.store') }}" method="post">
        <h5 class="text-info text-center">Nouvelle activité</h5>
        <hr>
        @csrf 
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom"  class="form-control" required>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-outline-primary mt-2 float-end">Créer</button>
        </div>
        </form>
    </div>
</div>

</x-app-layout>