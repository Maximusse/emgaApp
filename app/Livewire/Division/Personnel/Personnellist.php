<?php

namespace App\Livewire\Division\Personnel;

use Livewire\Component;
use App\Model\personnel;
use Livewire\Attributes\Layout;

#[Layout('layouts.app')] 
class Personnellist extends Component
{
    public function index()
    {
        $personnels = Personnel::all(); // Récupère tous les personnels
        return view('personnellist', compact('personnel'));
    }
    


    public function render()
    {
        return view('livewire.division.personnel.personnellist');
    }
}
