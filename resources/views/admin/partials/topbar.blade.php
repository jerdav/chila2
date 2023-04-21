        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">


  
            <!-- Topbar Navbar -->
            <ul class="navbar-nav"> 
              <!-- Nav Item - User Information -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                  <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{auth()->user()->username}}</span>
                  <i class="fas fa-user fa-2x"></i>
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                  <a class="dropdown-item" href="{{route('admin.dashboard')}}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Tableau de bord
                  </a>

                  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="{{ route('logout') }}"
                  onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                   {{ __('Déconnexion') }}
               </a>

               <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                   @csrf
               </form>
                </div>
              </li>
  
            </ul>
            <ul class="navbar-nav ml-auto">
                          <!-- Nav Item - Alerts -->
            <li class="nav-item  no-arrow mx-3">
              <a class="nav-link dropdown-toggle" href="{{route('admin.defaut-tract')}} "  role="button"  aria-haspopup="true" >
                <i class="fas fa-truck fa-2x"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">{{$tracteur_badge->count()}}  @if($tracteur_badge->count() > 1)  Défauts @else Défaut @endif </span>
              </a>
              <!-- Dropdown - Alerts -->
            </li>
            <li class="nav-item  no-arrow mx-3">
              <a class="nav-link dropdown-toggle" href="{{route('admin.defaut-remor')}} "  role="button"  aria-haspopup="true" >
                <img class="" src="{{asset('img/remor.png')}}" style="height: 2em;">
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">{{$remorque_badge->count()}}  @if($remorque_badge->count() > 1)  Défauts @else Défaut @endif</span>
              </a>
              <!-- Dropdown - Alerts -->
            </li>
            </ul>
  
          </nav>
          <!-- End of Topbar -->