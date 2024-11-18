<?php

namespace App\Livewire\Dorh\Divisions;

use App\Models\Divisions;
use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')] 
class AjouterDivisions extends Component
{
    public $ajouterdivisions = [
        'libel' => '',
    ];

    public function mount()
    {
        // Initialisation des données si nécessaire
    }

    public function ajouterDivision()
    {
        $this->validate([
            'ajouterdivisions.libel' => 'required|string|max:255',
        ]);

        Divisions::create($this->ajouterdivisions);

        session()->flash('message', 'Division ajoutée avec succès.');
        $this->reset('ajouterdivisions'); // Réinitialiser le champ après ajout
    }

    public function render()
    {
        return view('livewire.dorh.divisions.ajouter-divisions');
    }
}
