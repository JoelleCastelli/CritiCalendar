<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Sessions;

class Calendar extends Component
{
    public $events = [];

    public function render()
    {
        $this->events = json_encode(Sessions::all());
        return view('livewire.calendar');
    }
}
