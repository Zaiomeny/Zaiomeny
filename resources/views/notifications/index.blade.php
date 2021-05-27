<x-app-layout>
    <div class="w-100 row mx-auto p-4">
        <div class="w-100">
            <h5 class="text-left text-muted">Notifications</h5>
        </div>
        @foreach($notificationS as $notification)
            @if(Auth::user()->name == $notification->useurs_name)
            <div class="w-100 mt-2">
                <p class="p-3">
                  Vous avez  {{ $notification->longue_description }}
                </p>
            
            </div>
            @else
            <div class="w-100 mt-2">
                <p class="p-3">
                 {{ $notification->useurs_name  }} a {{ $notification->longue_description }}
                </p>
                
            </div>
            @endif
        @endforeach
        <!--pagination-->
        <div class="d-flex justify-content-center pagination-sm">
            {!!$notificationS->links('pagination::bootstrap-4')!!}
        </div>
    </div>
</x-app-layout>