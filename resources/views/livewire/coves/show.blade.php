<x-slot:header>
    <div class="flex items-center gap-3">
        <a href="{{ route('coves.index') }}" wire:navigate class="text-cove-ink-muted hover:text-cove-ink">
            &larr;
        </a>
        <h2 class="font-semibold text-xl text-cove-ink">
            {{ $cove->name }}
        </h2>
    </div>
</x-slot:header>

<div>
    <div class="max-w-2xl mx-auto px-4 py-6">
        @forelse ($this->entries as $entry)
            <div class="p-4 mb-3 rounded-xl bg-cove-surface border border-cove-border">
                <div class="flex items-center justify-between mb-2">
                    <span class="text-xs uppercase tracking-wide text-cove-teal">{{ $entry->type }}</span>
                    <span class="text-xs text-cove-ink-muted">{{ $entry->created_at->diffForHumans() }}</span>
                </div>

                @if ($entry->title)
                    <p class="font-serif text-lg text-cove-ink">{{ $entry->title }}</p>
                @endif

                @if ($entry->body)
                    <p class="text-sm text-cove-ink-muted mt-1">{{ $entry->body }}</p>
                @endif

                @if ($entry->url)
                    <a href="{{ $entry->url }}" target="_blank" rel="noopener" class="text-sm text-cove-teal break-all">
                        {{ $entry->url }}
                    </a>
                @endif
            </div>
        @empty
            <p class="text-cove-ink-muted text-center py-12">No entries yet - add your first one.</p>
        @endforelse
    </div>
</div>
