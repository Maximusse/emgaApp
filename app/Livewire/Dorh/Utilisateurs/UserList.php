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
        // dd('Formulaire envoyé');
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
