<?php
	use Illuminate\Support\Facades\Route;
    use App\Livewire\Division\Personnel\Personnellist;
    use App\Livewire\Division\Personnel\Creationpersonnel;
    use App\Http\Controllers\PersonnelController;



    Route::get('personnellist',Personnellist::class)->name('personnel');
    Route::get('creationpersonnel',Creationpersonnel::class)->name('creation');

Route::post('/division/personnel', [PersonnelController::class, 'store'])->name('division.personnel');