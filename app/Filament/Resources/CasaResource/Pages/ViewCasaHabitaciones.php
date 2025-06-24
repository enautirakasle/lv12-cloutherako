<?php

namespace App\Filament\Resources\CasaResource\Pages;

use App\Filament\Resources\CasaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use App\Filament\Resources\CasaResource\RelationManagers\HabitacionesRelationManager;


class ViewCasaHabitaciones extends ViewRecord
{
    protected static string $resource = CasaResource::class;

    protected static string $view = 'filament.resources.casas.pages.view-casa-habitaciones';

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                TextEntry::make('direccion'),
                // TextEntry::make('habitaciones')
            ]);
    }

    protected function getAllRelationManagers(): array
    {
        return [
            HabitacionesRelationManager::class,
        ];
    }
}
