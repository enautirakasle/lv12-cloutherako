<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UsuarioResource\Pages;
use App\Filament\Resources\UsuarioResource\RelationManagers;
use App\Models\Usuario;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Tables\Actions\Action;

class UsuarioResource extends Resource
{
    protected static ?string $model = Usuario::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Table $table): Table
    {


        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Action::make('settings')
                    ->label('Configuración')
                    ->url(UsuarioResource::getUrl('settings')),
                Action::make('misMotos')
                    ->label(fn($record) => 'Nire motoak (' . $record->motos()->count() . ')')
                    ->color('primary')
                    ->icon('heroicon-o-arrow-path')
                    ->url(
                        fn(Usuario $record) => route('filament.admin.pages.moto-page.{usuario}', ['usuario' => $record->id])
                    ),
                Action::make('misCoches')
                    ->label('Nire autoak')
                    ->url(fn($record) => route('filament.admin.pages.coche-page.{usuario}', ['usuario' => $record->id])),
                Action::make('komunkazioa')->label('Komunikazioa')
                                    ->url(fn($record) => route('filament.admin.pages.coche-page.{usuario}', ['usuario' => $record->id])),


            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            RelationManagers\CochesRelationManager::class,
            RelationManagers\MotosRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsuarios::route('/'),
            'create' => Pages\CreateUsuario::route('/create'),
            'edit' => Pages\EditUsuario::route('/{record}/edit'),
            'settings' => Pages\Settings::route('/settings'), // tu página custom dentro del recurso
        ];
    }
}
