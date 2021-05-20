@foreach($agentS as $agent)
                    <tr>
                        <td>n° {{ $agent->num_equipe }}</td>
                        <td>{{ $agent->nom }} <br> {{ $agent->prenom }}</td>
                        <td>{{ $agent->fonction }}</td>
                        @foreach($verificationS as $verification)
                            @if($verification->agent_id == $agent->id)
                                <td>{{ $verification->activite_nom }}</td>
                                <td>{{ $verification->total_a_justifier }}</td>
                                <td>{{ $verification->total_justifie }}</td>
                                <td>{{ $verification->reste }}</td>
                                <td>{{ $verification->observation }}</td>
                                <td>{{ $verification->date_de_verification }}</td>
                                <td>{{ $verification->verificateur }}</td>
                        

                            @endif
                        @endforeach
                    </tr>
                    @endforeach



                    @foreach($verificationS as $verification)
                    @foreach($agentS as $agent)
                        @if($verification->agent_id == $agent->id)

                        <tr>
                            <td>n° {{ $agent->num_equipe }}</td>
                            <td>{{ $agent->nom }} <br> {{ $agent->prenom }}</td>
                            <td></td>
                            <td>{{ $agent->fonction }}</td>
                            <td>{{ $verification->activite_nom }}</td>
                            <td>{{ $verification->total_a_justifier }}</td>
                            <td>{{ $verification->total_justifie }}</td>
                            <td>{{ $verification->reste }}</td>
                            <td>{{ $verification->observation }}</td>
                            <td>{{ $verification->date_de_verification }}</td>
                            <td>{{ $verification->verificateur }}</td>
                            
                        </tr>

                        @endif
                    @endforeach
                @endforeach