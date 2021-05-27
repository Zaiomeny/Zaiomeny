<x-app-layout>
    <div class="w-100 mt-2 p-4">
        <table class="table table-hover">
            <thead class="bg-ws">
                <tr>
                    <th>&&</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                </tr>
            </thead>
            <tbody>
                @foreach($userS as $user)
                    <tr>
                        <td class="text-center">
                            <img src="{{ asset('assets/images/user.png') }}" style="height:25px;width:25px;">
                        </td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            @foreach($role_userS as $role_user)
                                @if($user->id == $role_user->user_id)
                                    @if($role_user->role_id == 1)
                                         <span class="text-danger">Adminstrateur</span> 
                                    @elseif($role_user->role_id == 2)
                                         <span class="text-success">Utilisateur simple</span> 
                                    @endif
                                @endif
                            @endforeach
                        
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</x-app-layout>