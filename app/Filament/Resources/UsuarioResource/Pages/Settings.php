<?php

namespace App\Filament\Resources\UsuarioResource\Pages;

use App\Filament\Resources\UsuarioResource;
use Filament\Resources\Pages\Page;

class Settings extends Page
{
    protected static string $resource = UsuarioResource::class;

    protected static string $view = 'filament.resources.usuario-resource.pages.settings';

}
