<div id="pcoded" class="pcoded">

<?php
        $notificationS = DB::table('notifications')
                            ->where('etat','pas_encore_vue')
                            ->orderBy('created_at','desc')
                            ->get();
        $nombre_notification = DB::table('notifications')->where('etat','pas_encore_vue')->count();

?>


    <div class="pcoded-overlay-box"></div>
        <div class="pcoded-container navbar-wrapper">

            <nav class="navbar header-navbar pcoded-header p-0">
                <div class="navbar-wrapper">

                    <div class="navbar-logo">
                        <a class="mobile-menu" id="mobile-collapse" href="#">
                            <i class="ti-menu"></i>
                        </a>
                        
                        <a href="{{ route('dashboard') }}" class="center-block">
                            <img class="img-fluid" style="height:70px;" src="{{ asset('assets/images/logo.png')}}" alt="Theme-Logo" />
                        </a>
                        <a class="mobile-options">
                            <i class="ti-more"></i>
                        </a>
                    </div>

                    <div class="navbar-container container-fluid">
                        <ul class="nav-left">
                            <li>
                                <div class="sidebar_toggle"><a href="javascript:void(0)"><i class="ti-menu "></i></a></div>
                            </li>
                            
                            <li>
                                <a href="#!" onclick="javascript:toggleFullScreen()">
                                    <i class="ti-fullscreen"></i>
                                </a>
                            </li>
                        </ul>
                        <ul class="nav-right">
                            
                        <!--Notifications-->
                        <li class="header-notification">
                                <a href="#!">
                                    <i class="ti-bell"></i>
                                    <span class="badge bg-c-pink"></span>
                                </a>
                                <ul class="show-notification">
                                   <div class="">
                                   @if($nombre_notification !== 0)
                                        <li>
                                            <h6>Notifications</h6>
                                            <label class="label label-danger">{{ $nombre_notification }}</label>
                                        </li>
                                        <li>
                                            <h6>
                                                <a href="{{ route('notifications.index') }}" class="">Voir tout</a>
                                            </h6>
                                            <h6>
                                                <a href="{{ route('notifications.cacher') }}">Marquer tout comme vue</a>
                                            </h6>
                                        </li>
                                    
                                        
                                       <div class="notification_scroll">
                                       @foreach($notificationS as $notification)
                                            <li>
                                                <div class="media">
                                                    <div class="media-body">
                                                            
                                                            @if($notification->useurs_name == Auth::user()->name)
                                                                <h5 class="notification-user">Vous</h5>
                                                                <p class="notification-msg">avez {{ $notification->courte_description }}</p>
                                                                <span class="notification-time">Le {{ $notification->created_at}}</span>
                                                            @else
                                                                <h5 class="notification-user">{{ $notification->useurs_name }}</h5>
                                                                <p class="notification-msg">a { $notification->courte_description }}</p>
                                                                <span class="notification-time">Le {{ $notification->created_at}}</span>
                                                            @endif
                                                    </div>
                                                </div>
                                            </li>
                                        @endforeach
                                       </div>
                                        
                                    @else
                                        <li>
                                            <h6>Notifications</h6>
                                            <label class="label label-danger">0</label>
                                        </li>
                                    @endif

                                   </div>
                                </ul>
                                
                            </li>

                            <li class="user-profile header-notification">
                                <a>
                                    
                                    <span>
                                            @if(isset(Auth::user()->name))    
                                                {{ Auth::user()->name }}
                                            @endif
                                    </span>
                                    <i class="ti-angle-down"></i>
                                </a>
                                <ul class="show-notification profile-notification">
                                
                                    <li>
                                    @if(isset(Auth::user()->name))
                                        <a href="{{ route('profiles.view') }}" >                                    
                                            <i class="ti-user"></i> Voir mon profile
                                        </a>
                                    @endif
                                    </li>
                                   
                                    
                                    <li>
                                        <form action="{{ route('logout') }}" method="post">
                                            @csrf 
                                            <button type="submit">
                                                <i class="icofont icofont-logout"></i> Se déconnecter !
                                            </button>
                                        </form>
                                        
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        
                    </div>
                </div>
            </nav>

            <div class="pcoded-main-container">
                <div class="pcoded-wrapper">
                    <nav class="pcoded-navbar" >
                        
                        <div class="pcoded-inner-navbar main-menu">
                            
                                <div class="main-menu-header mb-0">
                                    <div class="user-details pt-3">
                                        <h4>
                                            @if(isset(Auth::user()->name))    
                                                {{ Auth::user()->name }}
                                            @endif
                                        </h4>
                                        
                                    </div>
                                </div>
                            
                            <ul class="pcoded-item pcoded-left-item">
                                <li>
                                    <a href="{{ route('dashboard') }}">
                                        <span class="pcoded-micon"><i class="icofont icofont-chart-bar-graph bg-c-blue"></i></span>
                                        <span class="pcoded-mtext" data-i18n="nav.dash.main">Tableau de bord</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                
                            </ul>
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.forms">AUDIT & UGP</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li>
                                    <a href="{{ route('projets.index') }}">
                                        <span class="pcoded-micon"><i class="ti-layers"></i><b>R</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Règlements</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                <li>
                                    <a href="#">
                                        <span class="pcoded-micon"><i class="ti-layers"></i><b>FC</b></span>
                                        <span class="pcoded-mtext" data-i18n="nav.form-components.main">Emplacements</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                </li>
                                
                            </ul>

                            
                            <div class="pcoded-navigatio-lavel" data-i18n="nav.category.other">Autres</div>
                            <ul class="pcoded-item pcoded-left-item">
                                <li>
                                    <a href="{{ route('users') }}">
                                        <span class="pcoded-micon"><i class="ti-user"></i><b>U</b></span>
                                        <span class="pcoded-mtext">Utilisateurs</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                   
                                </li>
                                <li>
                                    <a href="{{ route('verifications.termine') }}">
                                        <span class="pcoded-micon"><i class="ti-user"></i><b>U</b></span>
                                        <span class="pcoded-mtext">Activités vérifiées</span>
                                        <span class="pcoded-mcaret"></span>
                                    </a>
                                   
                                </li>
                            </ul>
                        </div>
                    </nav>
                    <div class="pcoded-content">
                        <div class="pcoded-inner-content">

                            <div class="main-body">
                                
                                    <div class="container-fluid">
                                        <div class="row  rounded p-2 shadow-lg" style="background-color: transparent;">
                                            {{ $slot }}
                                        </div>
                                    </div>
                                 
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


