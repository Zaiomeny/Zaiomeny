<x-app-layout>
    
<div class="row ">
            <div class="col-md-12 ">
                    <div class="w-100 d-flex justify-content-between">
                        <div>
                            <strong>CGP/UCGAI/INSTAT</strong>
                        </div>
                        <div class="mt-3">
                            <strong>OUTPUT DE VERIFICATION</strong> <br>
                            <h6 class="text-center">Activité : #############</h6>
                            <h6 class="text-center">Région : #######</h6>
                        </div>
                        <div>
                            <p class="font-weight-lighter font-weight-bolder"> <u>Date d' arrivée des PJs</u> :</p>
                            <p class="font-weight-lighter font-weight-bolder"> <u>Date de vérification</u> :</p>
                        </div>
                    </div>                  
            </div>            
        </div> 
            <form class="bg-white rounded border p-2 mt-4">
                <div class="row">
                    <div class="col-lg-2 col-md-6">
                        <label for=""> Réf E comptable :</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <label for="">Code banquaire :</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <label for="">N° écriture :</label>
                        <input type="text" class="form-control">
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <label for="">Date :</label>
                        <input type="date" name=""  class="form-control">
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <label for="">N° BR</label>
                        <select name="" class="form-select">
                            
                        </select>
                    </div>
                    <div class="col-lg-2 col-md-6">
                        <button type="submit" class="btn btn-outline-danger mt-4">╚</button>
                    </div>
                </div>
            </form>
            <hr>
            <div class="row mt-2">
            
                <div class="col-md-12 col-lg-12 col-xl-6">
                    <h2>Bordereau de règlement UGP</h2>
                    <hr>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Réf</th>
                                <th>Date</th>
                                <th>Montant</th>
                                <th>Bénéficiaire</th>
                                <th>Contact</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>3475</td>
                                <td>02/04/2021</td>
                                <td>21000000 Ar</td>
                                <td rowspan="2" class="align-middle text-center">FANAMPIMAHFALY Zaiomeny</td>
                                <td rowspan="2" class="align-middle text-center">0345916395</td>
                            </tr>
                            <tr>
                                <td>3475</td>
                                <td>06/04/2021</td>
                                <td>4000000 Ar</td>
                            </tr>
                        </tbody>
                        
                    </table>
                </div>
                <div class="col-md-12 col-lg-12 col-xl-6">
                    <h2>Vérification de pièces justificatives</h2>
                    <hr>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Mt brut</th>
                                <th>Mt validé</th>
                                <th>Reliquat reversé</th>
                                <th>Total justifié</th>
                                <th>Reste à justifier</th>
                                <th>Observation</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>12312</td>
                                <td>45684</td>
                                <td rowspan="2"></td>
                                <td rowspan="2"  class="align-middle text-center">4568</td>
                                <td></td>
                                <td rowspan="2"></td>
                            </tr>
                            <tr>
                                <td>45785</td>
                                <td>44585</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row mt-4">
                <form action="" class="w-75">
                    <div class="row">
                    <div class="col">
                        <label for="">Détail</label>
                        <input type="text" name="" id="" class="form-control">
                    </div>
                    <div class="col">
                        <label for="">Montant</label>
                        <input type="text" name="" id="" class="form-control">
                    </div>
                    </div>
                </form>
            </div>


</x-app-layout>