<x-app-layout>
    <div class=" row w-100 mx-auto p-5">
        
            <div class="col-md-6 mx-auto">
                <div class="w-50 mx-auto rounded justify-content-center">
                        <img src="{{asset('assets/images/avatar-1.jpg') }}" style="border-radius:15px;">                    
                </div>
                <p>
                    <h5 class="text-left">Nom : {{ Auth::user()->name }}  </h5>
                    <h5>Email : {{ Auth::user()->email }}</h5>

                    <!--Droit de l'utilisateur-->
                    <h6 class="text-muted">
                        Vous êtes :

                        @if(Auth::user()->hasRole('administrator'))
                            <span class="text-danger"> administrateur.</span>
                        @elseif(Auth::user()->hasRole('user'))
                            <span class="text-success"> utilisateur. </span>
                        @endif
                    </h6>
                </p>
            </div>

    </div>
</x-app-layout>