<div>
<form action="{{ route('division.personnel') }}" method="HEAD" enctype="multipart/form-data">  
    @csrf <!-- Ajoutez cette ligne pour inclure le token CSRF si vous utilisez Laravel -->  
    <div class="container mt-4">  
        <h2>Enregistrement d'un personnel</h2>  
        
        <div class="form-group">  
            <label for="name">Nom</label>  
            <input type="text" class="form-control" id="name" name="name" placeholder="ajoutez votre nom" required>  
        </div>  
        
        <div class="form-group">  
            <label for="prenom">Prénom</label>  
            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="ajoutez votre prenom" required>  
        </div>  
        
        <div class="form-group">  
            <label for="contact">Contact</label>  
            <input type="text" class="form-control" id="contact" name="contact" placeholder="ajoutez votre contact" required>  
        </div>  
        
        <div class="form-group">  
            <label for="date_naissance">Date de naissance</label>  
            <input type="date" class="form-control" id="date_naissance" name="date_naissance" placeholder="ajoutez votre date de naissance" required>  
        </div>  
        
        <div class="form-group">  
            <label for="lieu_naissance">Lieu de naissance</label>  
            <input type="text" class="form-control" id="lieu_naissance" name="lieu_naissance" placeholder="ajoutez votre lieu de naissance" required>  
        </div>  
        
        <div class="form-group">  
            <label for="email">Email</label>  
            <input type="email" class="form-control" id="email" name="email" placeholder="ajoutez votre email" required>  
        </div>  
        
        <div class="form-group">  
            <label for="matricule">Matricule</label>  
            <input type="text" class="form-control" id="matricule" name="matricule" placeholder="inscrivez votre matricul" required>  
        </div>  
        
        <div class="form-group">  
            <label for="sexe">Sexe</label>  
            <select class="form-control" id="sexe" name="sexe" placeholder="choisir votre sexe" required>  
                <option value="male">Masculin</option>  
                <option value="female">Féminin</option>  
                <option value="autre">Autre</option>  
            </select>  
        </div>  
        
        <div class="form-group">  
            <label for="mecano">Mécano</label>  
            <input type="text" class="form-control" id="mecano" name="mecano" placeholder="inscrivez votre mecano">  
        </div>  
        
        <div class="form-group">  
            <label for="photo">Photo d'identité</label>  
            <input type="file" class="form-control-file" id="photo" name="photo" accept="image/*" required>  
            <small class="form-text text-muted">Formats acceptés : jpg, png, jpeg.</small>  
        </div>  
        
        <button type="submit" class="btn btn-primary">Enregistrer</button>  
        <a href="{{ route('division.personnel') }}" class="btn btn-secondary">Annuler</a>  

        @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    </div>  
</form>



</div>