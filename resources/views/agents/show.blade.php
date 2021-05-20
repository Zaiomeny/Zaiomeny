<x-app-layout>
    
<?php
    $auj =now();
    $i = 1;
    $j = 1;
?>
<script>
    var somme;
</script>

<div class="row ">
            <div class="col-md-12 ">
                    <div class="w-100 d-flex justify-content-between">
                        <div>
                            <strong>CGP/UCGAI/INSTAT</strong>
                        </div>
                        <div class=" row mt-3 ">
                            <strong class='text-center mb-4'>OUTPUT DE VERIFICATION</strong> <br>
                            
                            @foreach($brS as $br)
                                @foreach($activiteS as $activite)
                                    @if($activite->id == $br->activite_id)
                                    <?php $i++;?>
                                        <div class="col-md-6 col-sm-12 m-1 rounded" style="background-color:rgba(0,0,0,0.070);">
                                            <h6 style="margin-left:5px;"><?= $i-1; ?> - <u class="text-danger">Activité</u> : <strong>{{ $activite->num_br }}</strong> {{ $activite->nom }}</h6>
                                            <h6 style="margin-left:5px;"> <u class="text-danger">Région</u> : ******</h6>
                                        </div>
                                    @endif
                                @endforeach
                            @endforeach
                            
                        </div>
                        <div class="p-2">
                            <p class="font-weight-lighter font-weight-bolder"> <u>Date d' arrivée des PJs</u> :</p>
                            <p class="font-weight-lighter font-weight-bolder"> <u>Date de vérification</u> : {{ $auj }}</p>
                        </div>
                    </div>                  
            </div>            
        </div> 
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
                        <tr >
                            <td style="borber:none;" style="height:0px;"></td>
                            <td style="borber:none;" style="height:0px;"></td>
                            <td style="borber:none;" style="height:0px;"></td> 
                            @foreach($agentS as $agent)         
                            <td rowspan="{{ $i }}" class="text-center align-middle">{{ $agent->nom }} {{ $agent->prenom }}</td>
                            <td rowspan="{{ $i }}" class="text-center align-middle">{{ $agent->telephone }}</td>
                            @endforeach
                        </tr>
                        
                        @foreach($brS as $br)
                                @foreach($activiteS as $activite)
                                    @if($activite->id == $br->activite_id)
                                    
                                <tr>
                                    <td>{{ $activite->num_br }}</td>
                                    <td>{{ $br->date_de_virement }}</td>
                                    <td>{{ $br->montant }} Ar</td>
                                    
                                </tr>
                                                            
                                
                                @endif
                            @endforeach
                        @endforeach
                        
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
                                <td style="height:0px;"></td>
                                <td style="height:0px;"></td>
                                <td rowspan="<?= $i; ?>"> <input type="text" name="somme" id="somme" class="form-control" disabled value="  "> </td>
                                <td rowspan="<?= $i; ?>"  class="align-middle text-center">***</td>
                                <td></td>
                                <td rowspan="<?= $i; ?>"></td>
                            </tr>
                                @foreach($brS as $br)
                                        @foreach($activiteS as $activite)
                                            @if($activite->id == $br->activite_id)
                                            
                                        <tr>
                                            <td>{{ $br->montant }} Ar</td>
                                            <td></td>
                                            <td></td>
        
                                        </tr>
                                                                    
                                        
                                        @endif
                                    @endforeach
                                @endforeach
                            
                            
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="row mt-4">
                <form action="{{ route('details.store') }}" method="POST" class="w-75">
                @csrf 
                    <div class="row">
                        <div class="col-md-8 col-lg-6 col-xl-6">
                            <label for="">Nom du BR associé</label>
                            <select name="activite_id" class="form-select">
                            @foreach($brS as $br)
                                @foreach($activiteS as $activite)
                                    @if($activite->id == $br->activite_id)
                                        <option value="{{ $activite->id }}">{{ $activite->nom }}</option>
                                    @endif
                                @endforeach
                            @endforeach
                            </select>
                        </div>
                        @foreach($agentS as $agent)
                            <input type="hidden" name="agent_id" value="{{ $agent->id }}">
                        @endforeach
                        <div class="col-md-8 col-lg-6 col-xl-6">
                            <label for="">Libélé d' activité</label>
                            <input type="text" name="libele_d_activite" id="" class="form-control" required>
                        </div>
                        <div class="col-md-8 col-lg-6 col-xl-6">
                            <label for="">Montant</label>
                            <input type="text" name="prix" id="" class="form-control" required>
                        </div>
                        <div class="co-md-8 col-lg-6 col-xl-6l">
                            <button type="submit" class="btn btn-outline-danger mt-4">Ajouter</button>
                        </div>
                    </div>
                </form>
                @if(session()->has('Detail'))
                   <?php $details = session('Detail');
                       // dd($details);
                   $somme = 0;
                   ?>
                @endif
                @if(isset($details))   
                   @foreach($brS as $br)
                        @foreach($activiteS as $activite)
                            @if($activite->id == $br->activite_id)
                            
                                <h5>{{ $activite->num_br }} : {{ $activite->nom }}</h5>
                                @foreach ($details as $detail)
                                <ul>
                                    @if($detail->activite_id == $activite->id)
                                    <?php $somme = $somme + $detail->prix ;
                                        
                                    ?>
                                    <script>  
                                    somme = <?php echo $somme; ?>;
                                    
                                    </script>
                                        <li>{{ $detail->libele_d_activite }}   {{ $detail->prix }}</li>
                                    @endif
                                </ul>
                                @endforeach
                                <script>
                                    alert(somme);
                                </script>
                            
                            @endif
                        @endforeach
                    @endforeach
                @endif
                
                
            </div>


</x-app-layout>