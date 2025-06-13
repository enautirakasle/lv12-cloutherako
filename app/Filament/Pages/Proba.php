<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;

class Proba extends Page
{
    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.proba';

    protected static bool $shouldRegisterNavigation = true; // Mostrar en el menú
}
