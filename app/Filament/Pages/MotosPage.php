<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use App\Models\Moto;

class MotosPage extends Page implements \Filament\Tables\Contracts\HasTable
{
    use \Filament\Tables\Concerns\InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.motos-page';

     public function table(Table $table): Table
    {
        return $table
            ->query(Moto::query())
            ->columns([
                TextColumn::make('id')->label('ID'),
                TextColumn::make('matricula')->label('Matrícula'),
            ])
            ->actions([
                // Acción para editar
                \Filament\Tables\Actions\EditAction::make()
                    ->form([
                        \Filament\Forms\Components\TextInput::make('matricula')
                            ->required()
                            ->maxLength(255),
                    ]),
            ]);
    }
}
