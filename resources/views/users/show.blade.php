<x-app-layout>
    <div class="p-12" style="background-color:transparent !important;">
        @foreach($users as $user)
            <div class="col-sm-12 col-md-12 mx-auto">
                <p>
                    <img src="{{asset('assets/images/avatar-1.jpg') }}" alt="" class="img-fluid img-circle">
                    <span class="qoute">
                        <i class="icofont icofont-quote-left"></i>
                    </span>
                    
                </p>
                <p>
                    <h5 class="text-left">Nom(s) et prénom(s) : {{ $user->name }}  </h5>
                    <h5>Email : {{ $user->email }}</h5>
                </p>
            </div>
        @endforeach
    </div>
</x-app-layout>