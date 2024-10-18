<?php
	use Illuminate\Support\Facades\Route;
	use App\Livewire\Dorh\Utilisateurs\UserList;
	
	Route::get('users-list',UserList::class)->name('utilisateurs');

    