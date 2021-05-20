<x-app-layout>

<div class="col-md-12 col-lg-12  p-6 shadow-sm rounded bordered bg-white" >
        <div>
            <h5 class="text-left">Nouvel agent</h5> <a  class="btn btn-outline-danger float-end"><i class="ti-plus"> Ajouter</i></a>
        </div>
        <br>
        <form action="{{ route('agents.store') }}" method="post" class="p-4" id="parent">
            @csrf 
           
                <div id="bloc">
                
                <div class="form-row rounded pt-2 pb-0 mt-2" >
                        
                        <!--Noms-->
                            <div class="col-lg-3 col-xs-4 col-md-6 col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon" id="name"><i class="icofont icofont-user-alt-3"></i></span>
                                    <input type="text" name="nom[]"  class="form-control form-control-info form-control-bold" placeholder="Noms" required>
                                </div>
                            </div>
                        <!--Prénoms-->
                            <div class="col-lg-3 col-xs-4 col-md-6 col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon" id="name"><i class="icofont icofont-student-alt"></i></span>
                                    <input type="text" name="prenom[]"  class="form-control form-control-info form-control-bold" placeholder="Prénoms">
                                </div>
                            </div>
                        <!--Adresse-->
                            <div class="col-lg-3 col-xs-4 col-md-6 col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon" id="name"><i class="icofont icofont-world"></i></span> 
                                    <input type="text" name="adresse[]"  class="form-control form-contro-info form-control-bold" placeholder="Adresse" required>
                                </div>
                            </div>
                        <!--Téléphone-->
                            <div class="col-lg-3 col-xs-4 col-md-6 col-sm-12">
                                <div class="input-group">
                                    <span class="input-group-addon" id="name"><i class="icofont icofont-phone"></i></span> 
                                    <input type="text" name="telephone[]"  class="form-control form-control-info form-control-bold" placeholder="Téléphone" required>
                                </div>
                            </div>

                
                    </div>
                    <hr>
                </div>
                
                  
           
            <div class="form-group p-1">
                <button type="submit" class="btn btn-skew btn-grd-primary float-end"><i class="ti-save-alt"> Soumettre</i></button>
            </div>
        </form>
    </div>


</x-app-layout>