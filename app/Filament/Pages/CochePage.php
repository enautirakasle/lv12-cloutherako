<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Tables;
use Filament\Tables\Table;
use App\Models\Coche;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class CochePage extends Page implements Tables\Contracts\HasTable
{

    use Tables\Concerns\InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.coche-page';


    protected static bool $shouldRegisterNavigation = false; // Mostrar en el menú

    public int $usuarioId;

    public static function getSlug(): string
    {
        return 'coche-page/{usuario}';
    }

    public function mount(int $usuario): void
    {
        $this->usuarioId = $usuario;
    }

    public function table(Table $table): Table
    {
        return $table
            ->query(Coche::where('usuario_id', $this->usuarioId))
            ->columns([
                Tables\Columns\TextColumn::make('id')->sortable(),
                Tables\Columns\TextColumn::make('matricula')->searchable()->sortable(),
            ])
            ->searchable()
            ->actions([
                \Filament\Tables\Actions\EditAction::make()
                    ->form([
                        \Filament\Forms\Components\TextInput::make('matricula')
                            ->required()
                            ->maxLength(255),
                    ]),
                \Filament\Tables\Actions\DeleteAction::make(),
            ])->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    \Filament\Tables\Actions\DeleteBulkAction::make(),


                ]),
            ]);
    }

    protected function getHeaderActions(): array
    {
        return [
            \Filament\Actions\CreateAction::make()

                ->label('Añadir Coche')
                // ->model(Coche::class)
                ->form([
                    \Filament\Forms\Components\TextInput::make('matricula')
                        ->required()
                        ->maxLength(255),
                ])
                ->action(function (array $data) {
                    Coche::create([
                        'usuario_id' => $this->usuarioId,
                        'matricula' => $data['matricula'],
                    ]);
                    Notification::make()
                        ->title(Auth::user()->name . ' saved successfully')
                        ->body('El coche ' . $data['matricula'] . ' ha sido añadido correctamente.')
                        ->success()
                        ->send();
                }),
        ];
    }
}
