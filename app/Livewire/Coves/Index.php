<?php

namespace App\Livewire\Coves;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Computed;
use App\Models\Cove;


#[Layout('layouts.app')]

class Index extends Component
{
    public string $newCoveName = '';
    public string $newCoveDescription = '';
    public bool $showCreateModal = false;

    public function render()
    {
        return view('livewire.coves.index');
    }

    #[Computed]
    public function coves()
    {
        return auth()->user()->coves()->withCount('entries')->latest('updated_at')->get();
    }

    public function openCreateModal(): void
    {
        $this->showCreateModal = true;
    }

    public function closeCreateModal(): void
    {
        $this->showCreateModal = false;
        $this->reset(['newCoveName', 'newCoveDescription']);
    }

    public function createCove(): void
    {
        $validated = $this->validate([
            'newCoveName' => 'required|string|max:255',
            'newCoveDescription' => 'nullable|string|max:1000',
        ]);

        auth()->user()->coves()->create([
            'name' => $validated['newCoveName'],
            'description' => $validated['newCoveDescription'],
        ]);

        $this ->closeCreateModal();
    }
}
