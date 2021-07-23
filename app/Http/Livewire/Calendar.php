<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use App\Models\Event;

class Calendar extends Component
{
    public $events = [];

    public function render()
    {
        $this->events = json_encode(User::getSessions());
        return view('livewire.calendar');
    }
}
