<x-slot:header>
    <h2 class="font-semibold text-xl text-cove-ink">
        {{ __('Coves') }}
    </h2>
</x-slot:header>

<div>
    <div class="max-w-2xl mx-auto px-4 py-6">
        @forelse ($this->coves as $cove)
            <a href="#" class="flex items-center gap-4 p-4 mb-3 rounded-xl bg-cove-surface border border-cove-border">
                <span
                    class="w-10 h-10 rounded-full shrink-0"
                    style="background-color: hsl({{ ($cove->id * 47) % 360 }}deg, 55%, 55%)"
                ></span>
                <div>
                    <p class="font-serif text-lg text-cove-ink">{{ $cove->name }}</p>
                    <p class="text-sm text-cove-ink-muted">{{ $cove->entries_count}} {{ Str::plural('entry', $cove->entries_count) }}</p>
                </div>
            </a>
        @empty
            <p class="text-cove-ink-muted text-center py-12">No Coves yet - create your first one.</p>
        @endforelse
    </div>

    <button
        wire:click="openCreateModal"
        class="fixed bottom-6 right-6 w-14 h-14 rounded-full bg-cove-gold text-white text-2xl shadow-lg flex items-center justify-center"
    >
    +
    </button>

    @if ($showCreateModal)
        <div class="fixed inset-0 bg-black/40 flex items-center justify-center p-4" wire:click.self="closeCreateModal">
            <div class="bg-cove-surface rounded-xl p-6 w-full max-w-sm">
                <h3 class="font-serif text-lg text-cove-ink mb-4">New Cove</h3>

                <form wire:submit="createCove">
                    <div class="mb-4">
                        <label class="block text-sm text-cove-ink-muted mb-1">Name</label>
                        <input
                            type="text"
                            wire:model="newCoveName"
                            class="w-full rounded-lg border border-cove-border bg-cove-bg px-3 py-2 text-cove-ink"
                        >
                        @error('newCoveName')
                            <p class="text-sm text-red-600 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block text-sm text-cove-ink-muted mb-1">Description (optional)</label>
                        <textarea
                            wire:model="newCoveDescription"
                            class="w-full rounded-lg border border-cove-border bg-cove-bg px-3 py-2 text-cove-ink"
                            rows="2"
                        ></textarea>
                    </div>

                    <div class="flex gap-3">
                        <button type="button" wire:click="closeCreateModal" class="flex-1 py-2 rounded-lg border border-cove-border text-cove-ink">
                            Cancel
                        </button>
                        <button type="submit" class="flex-1 py-2 rounded-lg bg-cove-gold text-white" wire:loading.attr="disabled" wire:target="createCove">
                            Create
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif

</div>