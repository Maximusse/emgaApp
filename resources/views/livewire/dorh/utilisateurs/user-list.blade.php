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
                      <th style="width: 40px">Options</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if($users)
                        @foreach($users as $user)
                        <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            {{ $user->name }}
                        </td>
                        <td>
                            {{ $user->roles->libelle_roles }}
                        </td>
                        <td>
                            {{ $user->typeUsers->libelle_type_users }}
                        </td>
                        <td>
                            <a class="btn btn-info">Details</a>
                        </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="6" style="text-align:center;"><b>Aucune donnée enregistrée</b></td>
                        </tr>
                    @endif
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
  </div>
   {{-- Modal --}}
 </div>
 