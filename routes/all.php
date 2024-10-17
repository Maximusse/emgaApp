<?php
    use App\Livewire\All\Dashboard;
	use Illuminate\Support\Facades\Route;

    Route::get('dashboard',Dashboard::class)->name('dashboard');