<div>
    <!-- Content Header (Page header) -->
    <div class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1 class="m-0">LISTE DES UTILISATEURS</h1>
         </div><!-- /.col -->
         <div class="col-sm-6">
           <ol class="breadcrumb float-sm-right">
             <li class="breadcrumb-item"><a href="#">Accueil</a></li>
             <li class="breadcrumb-item active">Utilisateurs</li>
           </ol>
         </div><!-- /.col -->
       </div><!-- /.row -->
     </div><!-- /.container-fluid -->
   </div>
   <!-- /.content-header -->
 
   <!-- Main content -->
   <section class="content">
     <div class="container-fluid">
       <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Etat</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row " style="margin-bottom:10px;">
                    <div class="col-lg-1 ">
                        <button class="btn btn-success addbtn" wire:click="showModal">Ajouter</button>
                    </div>
                </div>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th style="width: 10px">#</th>
                      <th>Identifiant</th>
                      <th>Nom d'utilisateur</th>
                      <th>Type d'utilisateur</th>
                      <th>Rôle</th>
                      <th>Satus</th>
                      <th>Options</th>
                      
                    </tr>
                  </thead>
                  <tbody>
                        @foreach($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->roles->libelle_roles }}</td>
                            <td>{{ $user->typeUsers->libelle_type_users }}</td>
                            <td>
                                <!-- Toggle switch for activation/deactivation -->
                                <div class="custom-control custom-switch">
                                    <input type="checkbox" class="custom-control-input" id="customSwitch{{$user->id}}" 
                                        wire:click="toggleStatus({{ $user->id }})" {{ $user->is_active ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="customSwitch{{$user->id}}">
                                        {{ $user->is_active ? 'Actif' : 'Inactif' }}
                                    </label>
                                </div>
                            </td>
                            <td>
                                <!-- Options: Modifier, Détails, Supprimer -->
                                <button wire:click="editUser({{ $user->id }})" class="btn btn-warning">Modifier</button>
                                <button wire:click="showUserDetails({{ $user->id }})" class="btn btn-info">Détails</button>

                                <button class="btn btn-danger" wire:click="deleteUser({{ $user->id }})">Supprimer</button>
                            </td>
                        </tr>
                        @endforeach





                          <!-- Modal pour les détails de l'utilisateur -->
                              <div class="modal fade" id="userDetailsModal" tabindex="-1" aria-labelledby="userDetailsModalLabel" aria-hidden="true">
                                  <div class="modal-dialog">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="userDetailsModalLabel">Détails de l'utilisateur</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                          </div>
                                          <div class="modal-body">
                                              @if($selectedUser)
                                                  <p><strong>Nom :</strong> {{ $selectedUser->name }}</p>
                                                  <p><strong>Email :</strong> {{ $selectedUser->email }}</p>
                                                  <p><strong>Rôle :</strong> {{ $selectedUser->roles->libelle_roles  ?? 'Non défini' }}</p>
                                                  <p><strong>Type :</strong> {{ $selectedUser->typeUsers->libelle_type_users ?? 'Non défini' }}</p>                                                  
                                                  <!-- Ajoutez d'autres détails si nécessaire -->
                                              @else
                                                  <p>Aucun utilisateur sélectionné.</p>
                                              @endif
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                        <!-- Modal de modification de l'utilisateur -->
                    <div class="modal fade" id="editUserModal" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="editUserModalLabel">Modifier l'utilisateur</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <!-- Formulaire de modification -->
                                    <form wire:submit.prevent="updateUser">
                                        <div class="mb-3">
                                            <label for="nom" class="form-label">Nom</label>
                                            <input type="text" id="nom" wire:model="state.nom" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="identifiant" class="form-label">Identifiant (Email)</label>
                                            <input type="text" id="identifiant" wire:model="state.identifiant" class="form-control">
                                        </div>
                                        <div class="mb-3">
                                            <label for="role" class="form-label">Rôle</label>
                                            <select id="role" wire:model="state.role" class="form-select">
                                                <option value="">Sélectionnez un rôle</option>
                                                @foreach($roles as $role)
                                                    <option value="{{ $role->id }}">{{ $role->libelle_roles }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="mb-3">
                                            <label for="type" class="form-label">Type</label>
                                            <select id="type" wire:model="state.type" class="form-select">
                                                <option value="">Sélectionnez un type</option>
                                                @foreach($types as $type)
                                                    <option value="{{ $type->id }}">{{ $type->libelle_type_users }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Validez</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                          <!-- Modal Suppression -->
                      <div class="modal fade" id="deleteUserModal" wire:model="showDeleteConfirmation" tabindex="-1" aria-labelledby="deleteUserModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="deleteUserModalLabel">Confirmation de Suppression</h5>                          
                            </div>
                            <div class="modal-body">
                              <p>Voulez-vous vraiment supprimer cet utilisateur ?</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" wire:click="$set('showDeleteConfirmation', false)">Annuler</button>
                              <button type="button" class="btn btn-danger" wire:click="confirmDelete">Supprimer</button>
                            </div>
                          </div>
                        </div>
                      </div>

                    </tbody>
                </table>
              </div>
              <!-- /.card-body -->
              <div class="card-footer clearfix">
                <ul class="pagination pagination-sm m-0 float-right">
                  <li class="page-item"><a class="page-link" href="#">«</a></li>
                  <li class="page-item"><a class="page-link" href="#">1</a></li>
                  <li class="page-item"><a class="page-link" href="#">2</a></li>
                  <li class="page-item"><a class="page-link" href="#">3</a></li>
                  <li class="page-item"><a class="page-link" href="#">»</a></li>
                </ul>
              </div>
            </div>
            <!-- /.card -->
          </div>
       </div>
     </div><!-- /.container-fluid -->
   </section>
   <!-- /. Main content -->

   {{-- Modal --}}
   <div class="modal fade" id="addUserModal" wire:ignore.self>
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Enregistrer un nouvel utilisateur</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form wire:submit="asking">
            <div class="row">
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="">NOM</label>
                        <input type="text" wire:model="state.nom" class="form-control" placeholder="Nom de l'utilisateur" >
                        @error('nom')
                        <small style="color:red;">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="">IDENTIFIANT</label>
                        <input type="text" wire:model="state.identifiant" class="form-control"  placeholder="Entrez l'identifiant de l'utilisateur" >
                        @error('identifiant')
                        <small style="color:red;">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="">ROLE</label>
                        <select class="form-control" wire:model="state.role">
                            <option >--Séléctionnez le role de l'utilisateur--</option>
                            @foreach($roles as $role)
                            <option value="{{$role->id}}">{{$role->libelle_roles}}</option>
                            @endforeach
                        </select>
                        @error('role')
                        <small style="color:red;">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <label for="">TYPE</label>
                        <select class="form-control" wire:model="state.type">
                            <option value="">--Séléctionnez le type de l'utilisateur--</option>
                            @foreach($types as $type)
                            <option value="{{$type->id}}">{{$type->libelle_type_users}}</option>
                            @endforeach
                        </select>
                        @error('type')
                        <small style="color:red;">{{$message}}</small>
                        @enderror
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="form-group">
                        <button class="btn btn-success" type="submit">Enregistrer</button>
                        <button class="btn btn-default" >Annuler</button>
                    </div>
                </div>
            </div>
          </form>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
    <script>
    window.addEventListener('show-add-user-modal', event => {
        $('#addUserModal').modal('show');
    });


    document.addEventListener('DOMContentLoaded', function () {
    window.addEventListener('show-modal', event => {
        const modal = document.querySelector(event.detail.modal);
        if (modal) {
            const bootstrapModal = new bootstrap.Modal(modal);
            bootstrapModal.show();
        }
    });
});


    document.addEventListener('DOMContentLoaded', function () {
    window.addEventListener('show-modal', event => {
        const modal = document.querySelector(event.detail.modal);
        if (modal) {
            const bootstrapModal = new bootstrap.Modal(modal);
            bootstrapModal.show();
        }
           });
           });


    window.addEventListener('show-delete-user-modal', event => {
        $('#deleteUserModal').modal('show');
    });
</script>

  </div>
   {{-- Modal --}}
 </div>
 