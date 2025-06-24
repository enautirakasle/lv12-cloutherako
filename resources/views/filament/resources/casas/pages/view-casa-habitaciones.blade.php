<x-filament-panels::page>
    @if ($this->hasInfolist())
        {{ $this->infolist }}
    @else
        {{ $this->form }}
    @endif
<div style="font-size: 2rem; color: #1ee99b; display: flex; align-items: center; gap: 0.5rem;">
    <x-heroicon-o-heart class="w-8 h-8" style="color: #118f7a;" />
    Kaixo Miren
</div>
@if (count($relationManagers = $this->getRelationManagers()))
    <x-filament-panels::resources.relation-managers
        :active-manager="$this->activeRelationManager"
        :managers="$relationManagers"
        :owner-record="$record"
        :page-class="static::class"
    />
@endif 
</x-filament-panels::page>