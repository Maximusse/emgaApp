<?php

namespace App\Livewire\Division\Personnel;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Models\Personnel;
use Livewire\Attributes\Layout;





#[Layout('layouts.app')] 
class Creationpersonnel extends Component
{


    use WithFileUploads; // Pour gérer le téléchargement de fichiers  

    public $name, $prenom, $contact, $date_naissance, $lieu_naissance, $email, $matricule, $sexe, $mecano, $photo;  
    public $personnels = [];  

    protected $rules = [  
        'name' => 'required|string|max:255',  
        'prenom' => 'required|string|max:255',  
        'contact' => 'required|string|max:255',  
        'date_naissance' => 'required|date',  
        'lieu_naissance' => 'required|string|max:255',  
        'email' => 'required|email|max:255|unique:personnels',  
        'matricule' => 'required|string|max:255',  
        'sexe' => 'required|string',  
        'mecano' => 'nullable|string|max:255',  
        'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',  
    ];  

    public function submit()  
    {  
        $this->validate();  

        $path = $this->photo->store('photos', 'public');  

        Personnel::create([  
            'name' => $this->name,  
            'prenom' => $this->prenom,  
            'contact' => $this->contact,  
            'date_naissance' => $this->date_naissance,  
            'lieu_naissance' => $this->lieu_naissance,  
            'email' => $this->email,  
            'matricule' => $this->matricule,  
            'sexe' => $this->sexe,  
            'mecano' => $this->mecano,  
            'photo' => $path,  
        ]);  

        $this->reset(); // Réinitialise le formulaire  
        $this->emit('personnelStored'); // Émet un événement pour rafraîchir la liste  
    }  
    // Méthode pour rafraîchir la liste des personnels  
    public function refreshedPersonnels()  
    {  
        $this->personnels = Personnel::all();  
    }  

    public function render()
    {
        $this->personnels = Personnel::all(); // Charger les personnels pour affichage 
        return view('livewire.division.personnel.creationpersonnel');
    }
}
