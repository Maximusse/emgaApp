<div>
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">LISTE DIVISIONS</h1>
        </div>
      </div>
    </div>
  </div>

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Etat</h3>
            </div>
            <div class="card-body">
              <div class="row mb-2 text-center">
                <!-- Bouton pour ouvrir le modal -->
                <button type="button" class="btn btn-default" data-bs-toggle="modal" data-bs-target="#modal-default">
                 + Ajouter
                </button>
              </div>

              <!-- Modal -->
              <div class="modal fade" id="modal-default" tabindex="-1" aria-labelledby="modalDefaultLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h4 class="modal-title" id="modalDefaultLabel">Ajouter une Division</h4>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form wire:submit.prevent="updateUser">
                                        <div class="mb-3">
                                            <label for="nom" class="form-label">DIVISIONS</label>
                                            <input type="text" id="nom" wire:model="state.nom" class="form-control">
                                        </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-default" data-bs-dismiss="modal">Close</button>
                                 <button type="button" class="btn btn-primary">Save</button>
                            </div>
                    </form>
                  </div>
                </div>
              </div>

              <!-- Tableau -->
              <table class="table table-bordered">
                <thead>
                  <tr>
                    <th style="width: 10px">#</th>
                    <th>Division</th>
                    <th>Détails</th>
                  </tr>
                </thead>
                <tbody>
                  @if($divisions)
                    @foreach($divisions as $division)
                    <tr>
                      <td>{{ $loop->iteration }}</td>
                      <td>{{ $division->libel }}</td>
                      <td>
                        <a href="{{ route('divisions.details', $division->id) }}" class="btn btn-info btn-sm">Voir</a>
                        <a href="{{ route('divisions.edit', $division->id) }}" class="btn btn-warning btn-sm">
                          <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('divisions.destroy', $division->id) }}" method="POST" class="d-inline">
                          @csrf
                          @method('DELETE')
                          <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Confirmer la suppression ?')">
                            <i class="fas fa-trash-alt"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                    @endforeach
                  @endif
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<!-- Inclure Bootstrap -->

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
