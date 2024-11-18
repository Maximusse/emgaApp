<?php
	use Illuminate\Support\Facades\Route;
	use App\Livewire\Dorh\Utilisateurs\UserList;
	use App\Livewire\Dorh\Divisions\DivisionsList;
	use App\Livewire\Dorh\Cartes\CartesAccess;
	use APP\Http\Controllers\Usercontroller;
    use App\Http\Controllers\DivisionsController;
	use App\livewire\dorh\divisions\AjouterDivisions;


	Route::get('users-list',UserList::class)->name('utilisateurs');
	Route::get('divisions-list',DivisionsList::class)->name('divisions');
	Route::get('cartes-access',CartesAccess::class)->name('cartes');


	route::get('ajouter-divisions',AjouterDivisions::class)->name('ajouter');