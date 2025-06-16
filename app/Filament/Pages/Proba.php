<?php

namespace App\Filament\Pages;

use Filament\Tables;
use Filament\Tables\Table;

use Filament\Pages\Page;
use App\Models\Moto;

class Proba extends Page implements Tables\Contracts\HasTable
{

    use Tables\Concerns\InteractsWithTable;

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

    public function table(Table $table): Table
    {
        return $table
            ->query(Moto::where('usuario_id', $this->usuarioId))
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('matricula')->searchable()->sortable(),
            ])
            ->searchable()
            ->actions([
                // Tables\Actions\EditAction::make(),
                // Tables\Actions\DeleteAction::make(),
            ]);
    }
}
