<x-filament-panels::page>
    <a href="{{ route('filament.admin.resources.usuarios.settings') }}">Settings</a>
        <h2 class="text-xl font-bold mb-4">Pág para el usuario con ID: {{ $usuarioId }}</h2>

        {{ $this->table }}
        
</x-filament-panels::page>
