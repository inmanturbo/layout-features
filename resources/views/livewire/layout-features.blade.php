<?php

use Illuminate\Support\Facades\Auth;
use Inmanturbo\Features\FeatureRegistry;
use Inmanturbo\LayoutFeatures\Layout;
use Laravel\Pennant\Feature;
use Livewire\Volt\Component;

new class extends Component {
    public ?string $currentLayout;

    public function mount()
    {
        $this->currentLayout = Layout::currentLayout()?->name;
    }

    public function updatedCurrentLayout()
    {
        Layout::updateCurrentLayout($this->currentLayout);

        $this->js('window.location.reload(true)');
    }
}; ?>


<flux:radio.group x-data variant="segmented" wire:model.live="currentLayout">
    @foreach(Inmanturbo\Layout::layoutOptions() as $layoutOption)
        <flux:radio 
            :value="$layoutOption->driver" 
            :label="$layoutOption->name" 
            :description="$layoutOption->description"
            :icon="$layoutOption->icon" >
            {{ $layoutOption->name }}
        </flux:radio>
    @endforeach
</flux:radio.group>
