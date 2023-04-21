<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-table mr-1"></i>
        Tableau des inscrits
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Pseudo</th>
                        <th>Role</th>
                        <th>Mot de passe</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Nom</th>
                        <th>Role</th>
                        <th>Pseudo</th>
                        <th>Mot de passe</th>
                        <th>Date</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->prenom}} {{$user->nom}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->role->name}}</td>                       
                        <td>{{$user->password}}</td>
                        <td>{{$user->created_at}}</td>
                    </tr>
                    @endforeach

                  
                </tbody>
            </table>
        </div>
    </div>
</div>