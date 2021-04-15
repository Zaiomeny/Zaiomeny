@extends('activites.layout')
@section('content')
<?php
    $auj =now();
    $i = 1;
    $j = 1;
?>
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
                                <td rowspan="<?= $i; ?>"></td>
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

@endsection