<?php

namespace App\Filament\Pages;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Form;
use Filament\Forms\Contracts\HasForms;



use Filament\Pages\Page;
use App\Models\Moto;
use Illuminate\Testing\Fluent\Concerns\Has;
use Illuminate\Support\Facades\Auth;
use Filament\Notifications\Notification;

class MotoPage extends Page implements Tables\Contracts\HasTable
{

    use Tables\Concerns\InteractsWithTable;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';

    protected static string $view = 'filament.pages.moto-page';

    protected static bool $shouldRegisterNavigation = false; // Mostrar en el menú

    public int $usuarioId;

    public static function getSlug(): string
    {
        return 'moto-page/{usuario}';
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

    

    public function getTitle(): string
    {
        return 'Motos del Usuario ' . $this->usuarioId;
    }

    public function getHeaderActions(): array
    {
        return [
            \Filament\Actions\CreateAction::make()
                ->form([
                    \Filament\Forms\Components\TextInput::make('matricula')
                        ->required()
                        ->maxLength(255),
                ])
                ->action(function (array $data) {
                    Moto::create([
                        'matricula' => $data['matricula'],
                        'usuario_id' => $this->usuarioId,
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
