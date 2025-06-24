<?php

namespace App\Filament\Resources\CasaResource\Pages;

use App\Filament\Resources\CasaResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use App\Filament\Resources\CasaResource\RelationManagers\HabitacionesRelationManager;


class ViewCasa extends ViewRecord
{
    protected static string $resource = CasaResource::class;

    public function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\TextEntry::make('direccion'),
                Infolists\Components\TextEntry::make('habitaciones'),
            ]);
    }


     protected function getAllRelationManagers(): array
    {
        return [
            HabitacionesRelationManager::class,
        ];
    }   
}
