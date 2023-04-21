
	<!-- Sidebar -->
	<ul class= "navbar-nav bg-gradient-dark sidebar sidebar-dark accordion" id="accordionSidebar">
		
		<!-- Sidebar - Brand -->
		<a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('admin.dashboard')}}">
			<div class="sidebar-brand-icon rotate-n-15">
				<i class="fas fa-laugh-wink"></i>
			</div>
			<div class="sidebar-brand-text mx-3">Trs Chila</div>
		</a>
		
		<!-- Divider -->
		<hr class="sidebar-divider my-0">
		
		<!-- Nav Item - Dashboard -->
		
		
		<!-- Divider -->
		<hr class="sidebar-divider">
		
		<!-- Heading -->
		<div class="sidebar-heading">
			Interface
		</div>

		<li class="nav-item ">
			<a class="nav-link collapsed" href="#"  >
				<i class="fas fa-cog"></i>
				<span>Fiches de travail</span>
			</a>
			<div id="collapseTwo" class="collapse show" >
				<div class="bg-white py-2 collapse-inner rounded">
					<a class="collapse-item {{Route::is('admin.travail') ? 'active' : ''}} " href="{{route('admin.travail')}}">Fiche travail
						<span class="badge badge-danger badge-counter float-right">{{$travail_badge->count()}} Vali... </span>
					</a>
					<a class="collapse-item {{Route::is('admin.atelier') ? 'active' : ''}} " href="{{route('admin.atelier')}}">Fiche Atelier
						<span class="badge badge-danger badge-counter float-right">{{$atelier_badge->count()}} Vali... </span>
					</a>
				</div>
			</div>
		</li>


		<!-- Nav Item - Pages Collapse Menu -->
		<li class="nav-item ">
			<a class="nav-link collapsed" href="#"  >
				<i class="fas fa-columns"></i>
				<span>Défauts constatés</span>
			</a>
			<div id="collapseTwo" class="collapse show" >
				<div class="bg-white py-2 collapse-inner rounded">
					<a class="collapse-item {{Route::is('admin.defaut-tract') ? 'active' : ''}} " href="{{route('admin.defaut-tract')}}">Tracteurs
						<span class="badge badge-danger badge-counter float-right">
							{{$tracteur_badge->count()}}  @if($tracteur_badge->count() < 2)  Défaut @else Défauts @endif
						</span>
					</a>
					<a class="collapse-item {{Route::is('admin.defaut-remor') ? 'active' : ''}} " href="{{route('admin.defaut-remor')}}">Remorques
						<span class="badge badge-danger badge-counter float-right">
							{{$remorque_badge->count()}} @if($remorque_badge->count() < 2)  Défaut @else Défauts @endif 
						</span>
					</a>
				</div>
			</div>
		</li>
		
		<!-- Nav Item - Pages Collapse Menu -->
		<li class="nav-item ">
			<a class="nav-link collapsed" href="#"  >
				<i class="fas fa-columns"></i>
				<span>Tableaux</span>
			</a>
			<div id="collapseTwo" class="collapse show" >
				<div class="bg-white py-2 collapse-inner rounded">
					<a class="collapse-item {{Route::is('admin.tab-admin') ? 'active' : ''}} " href="{{route('admin.tab-admin')}}">Administrateurs</a>
					<a class="collapse-item {{Route::is('admin.tab-chauf') ? 'active' : ''}} " href="{{route('admin.tab-chauf')}}">Chauffeurs</a>
					<a class="collapse-item {{Route::is('admin.tab-tract') ? 'active' : ''}} " href="{{route('admin.tab-tract')}}">Tracteurs</a>
					<a class="collapse-item {{Route::is('admin.tab-remor') ? 'active' : ''}} " href="{{route('admin.tab-remor')}}">Remorques</a>
				</div>
			</div>
		</li>
		
		<!-- Divider -->
		<hr class="sidebar-divider">
		
		<!-- Nav Item - Utilities Collapse Menu -->
		<li class="nav-item">
			<a class="nav-link collapsed" href="#"  >
				<i class="fas fa-user"></i>
				<span> Ajout Utilisateurs</span>
			</a>
			<div id="collapseUsers" class="collapse show" >
				<div class="bg-white py-2 collapse-inner rounded">
					<a class="collapse-item {{Route::is('crea-admin')  ? 'active' : ''}}" href="{{route('crea-admin')}}">Administrateurs</a>
					<a class="collapse-item {{Route::is('crea-chauf')  ? 'active' : ''}}" href="{{route('crea-chauf')}}">Chauffeurs</a>
				</div>
			</div>
		</li>
		
		<!-- Divider -->
		<hr class="sidebar-divider">
		
		<!-- Nav Item - Utilities Collapse Menu -->
		<li class="nav-item">
			<a class="nav-link collapsed" href="#"  >
				<i class="fas fa-truck"></i>
				<span> Ajout Véhicules</span>
			</a>
			<div id="collapseVehivules" class="collapse show" >
				<div class="bg-white py-2 collapse-inner rounded">
					<a class="collapse-item {{Route::is('crea-tract')  ? 'active' : ''}}" href="{{route('crea-tract')}}">Tracteurs</a>
					<a class="collapse-item {{Route::is('crea-remor')  ? 'active' : ''}}" href="{{route('crea-remor')}}">Remorques</a>
				</div>
			</div>
		</li>
		
		
		
		<!-- Divider -->
		<hr class="sidebar-divider d-none d-md-block">
		

		
	</ul>
	<!-- End of Sidebar -->