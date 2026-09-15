<?php

namespace App\Livewire\Coves;

use App\Models\Cove;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('layouts.app')]
class Show extends Component
{
    public Cove $cove;

    public function mount(Cove $cove): void
    {
        $this->authorize('view', $cove);

        $this->cove = $cove;
    }

    public function render()
    {
        return view('livewire.coves.show');
    }

    #[Computed]
    public function entries()
    {
        return $this->cove->entries()->latest()->get();
    }
}
