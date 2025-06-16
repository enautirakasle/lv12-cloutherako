<?php

namespace App\Filament\Pages;
use App\Models\Usuario;

use Filament\Pages\Page;

class Proba extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.proba';

    protected static bool $shouldRegisterNavigation = false; // Mostrar en el menú

    public int $usuarioId;

    public static function getSlug(): string
    {
        return 'proba/{usuario}';
    }

    public function mount(int $usuario): void
{
    $this->usuarioId = $usuario;
}
}
