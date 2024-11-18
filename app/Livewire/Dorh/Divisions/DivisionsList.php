<?php

namespace App\Livewire\Dorh\Divisions;

use App\Models\Divisions; // Utilisation correcte du modèle Divisions
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')] 
class DivisionsList extends Component
{

    public $divisions;

    public function mount()
    {
 
        
    } 
    public function render()
    {
        return view('livewire.dorh.divisions.divisions-list');
    }
}
