<?php

namespace App\Livewire\Dorh\Cartes;



use Livewire\Attributes\Layout;
use Livewire\Attributes\Title;
use Livewire\Component;


#[Layout('layouts.app')] 
class CartesAccess extends Component
{
    public function render()
    {
        return view('livewire.dorh.cartes.cartes-access');
    }
}
