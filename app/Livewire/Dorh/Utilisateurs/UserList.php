<?php

namespace App\Livewire\Dorh\Utilisateurs;

use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Layout('layouts.app')] 
#[Title('UTILISATEURS | EMGA APP')] 
class UserList extends Component
{
    public function render()
    {
        return view('livewire.dorh.utilisateurs.user-list');
    }
}
