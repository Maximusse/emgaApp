<?php


namespace App\Livewire\Dorh\Utilisateurs;

use App\Models\User;
use App\Models\Roles;
use App\Models\TypeUsers;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Validator;


#[Layout('layouts.app')]
#[Title('UTILISATEURS | EMGA APP')] 
class UserManagement extends Component
{


    public $users, $roles, $types;
    public $userId, $state = [], $showDetailsModal = false, $showEditModal = false, $showDeleteConfirmation = false;

    public function mount()
    {
        $this->roles = Roles::all();
        $this->types = TypeUsers::all();
        $this->loadUsers();
    }

    public function loadUsers()
    {
        $this->users = User::with('roles', 'typeUsers')->get();
    }

    public function showDetails($id)
    {
        $this->userId = $id;
        $this->state = User::findOrFail($id)->toArray();
        $this->dispatchBrowserEvent('show-details-user-modal');
    }

    public function editUser($id)
    {
        $this->userId = $id;
        $this->state = User::findOrFail($id)->toArray();
        $this->dispatchBrowserEvent('show-edit-user-modal');
    }

    public function updateUser()
    {
        $user = User::findOrFail($this->userId);
        $user->update($this->state);
        $this->showEditModal = false;
        $this->loadUsers();
    }

    public function deleteUser($id)
    {
        $this->userId = $id;
        $this->dispatchBrowserEvent('show-delete-user-modal');
    }

    public function confirmDelete()
    {
        User::findOrFail($this->userId)->delete();
        $this->showDeleteConfirmation = false;
        $this->loadUsers();
    }
    


    public function render()
    {
        return view('livewire.dorh.utilisateurs.user-management');
    }
}
