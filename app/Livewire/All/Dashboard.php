<?php

namespace App\Livewire\All;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')] 
class Dashboard extends Component
{
    public function render()
    {
        return view('livewire.all.dashboard');
    }
}
