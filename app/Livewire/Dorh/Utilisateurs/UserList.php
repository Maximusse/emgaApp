<?php

namespace App\Livewire\Dorh\Utilisateurs;

use App\Models\User;
use App\Models\Roles;
use App\Models\TypeUsers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')] 
#[Title('UTILISATEURS | EMGA APP')] 
class UserList extends Component
{

    public $user = null;

    public $state = [
        'identifiant' => '',
        'nom' => '',
        'role' => '',
        'type' => '',
    ];

    public function showModal(){
        $this->dispatch('show-modal',['modal' => '#addUserModal']);
    }
    
    public $selectedUser;

    public function showUserDetails($userId) {
        $this->selectedUser = User::find($userId);
        if ($this->selectedUser) {
            // Déclenche l'affichage de la modale avec les détails de l'utilisateur
            $this->dispatch('show-modal', ['modal' => '#userDetailsModal']);
        }
    }
    
    public function toggleStatus($userId) {
        $status = null;
        $user = User::find($userId);
        if($user->is_active == 1){
            $status = 0;
            // $data = ['is_active' => 0];
            // $user->is_active = 0;
        }
        if($user->is_active == 0){
            $status = 1;
            // $data = ['is_active' => 1];
            // $user->is_active = 1;
        }
        // $user->status = !$user->status;
        // $user->update($data);
        $user->is_active = $status;
        $user->save();
        // session()->flash('message', 'Statut mis à jour avec succès.');
    }
    
   
               

    public $editingUser;

    public function editUser($userId) {
        $this->editingUser = User::find($userId);
    
        if ($this->editingUser) {
            // Charger les données de l'utilisateur dans le tableau d'état pour le formulaire
            $this->state = [
                'identifiant' => $this->editingUser->email,
                'nom' => $this->editingUser->name,
                'role' => $this->editingUser->roles_id,
                'type' => $this->editingUser->types_users_id,
            ];
    
            // Déclencher l'ouverture de la modale de modification
            $this->dispatch('show-modal', ['modal' => '#editUserModal']);
        }
    }

       // prise en compte dans le
    public function updateUser() {
        if ($this->editingUser) {
            $this->validate([
                'state.nom' => 'required|min:2',
                'state.identifiant' => 'required|email',
                'state.role' => 'required|exists:roles,id',
                'state.type' => 'required|exists:type_users,id',
            ]);
    
            // Mettre à jour les informations de l'utilisateur
            $this->editingUser->update([
                'name' => $this->state['nom'],
                'email' => $this->state['identifiant'],
                'roles_id' => $this->state['role'],
                'types_users_id' => $this->state['type'],
            ]);
    
            // Fermer la modale et afficher un message de succès
            $this->dispatch('hide-modal', ['modal' => '#editUserModal']);
            session()->flash('message', 'Utilisateur mis à jour avec succès.');
    
            // Actualiser la liste des utilisateurs
            $this->render();
        }
    }


     


    public function addUserRules(){
        Validator::make(
            $this->state,
            [
                'nom' => 'required|min:2',
                'identifiant' => 'required|min:5',
                'role' => 'required|exists:roles,id',
                'type' => 'required|exists:type_users,id',
            ],
            [
                'nom.required' => "Veuillez inserer le nom de l'utilisateur.",
                'nom.min' => "Le nom de l'utilisateur doit comporter au moin deux caractères.",
                'identifiant.required' => "Veuillez entrer l'identifiant.",
                'identifiant.min' => "L'identifiant doit comporter au moin cinq caractères.",
                'role.required' => "Veuillez sélectionner le role de l'utilisateur.",
                'role.exists' => "Role introuvable.",
                'type.required' => "Veuillez sélectionner le type de l'utilisateur.",
                'type.exists' => "Type introuvable.",
            ]
        )->validate();
        
    }

    public function asking(){
        $this->addUserRules();
        // Declencher l'evenement show-modal au niveau du fichier javascript
        $this->dispatch('success-toast-hide-modal',['title' => "Terminer",'msg' => "Utilisateur enregistrer avec succès", 'modal' => '#addUserModal']);
        
    }

    public function getUsers(){
        return User::where('status',1)->with(['roles','typeUsers'])->get();
    }

    public function rolesOption(){
        return Roles::all();
    }

    public function typesOption(){
        return TypeUsers::all();
    }

    public function viewDetails($id)
{
    $this->selectedUser = User::find($id);
    $this->dispatchBrowserEvent('show-details-modal');
}

    public function render()
    {
        $data = [
            'users' => $this->getUsers(),
            'roles' => $this->rolesOption(),
            'types' => $this->typesOption(),
        ];
        return view('livewire.dorh.utilisateurs.user-list',$data);
    }
    
}

