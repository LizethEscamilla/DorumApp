<?php

namespace App\Filament\Resources;

use App\Filament\Resources\DonorResource\Pages;
use App\Filament\Resources\DonorResource\RelationManagers;
use App\Models\Donor;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class DonorResource extends Resource
{
    protected static ?string $model = Donor::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255),
                Forms\Components\DatePicker::make('fecha_nacimiento')
                    ->label('Fecha de Nacimiento')
                    ->required(),
                Forms\Components\TextInput::make('tipo_sangre')
                    ->label('Tipo de Sangre')
                    ->required()
                    ->maxLength(3),
                Forms\Components\Select::make('genero')
                    ->label('Género')
                    ->options([
                        'Masculino' => 'Masculino',
                        'Femenino' => 'Femenino',
                    ])
                    ->required(),
                Forms\Components\Textarea::make('historial_medico')
                    ->label('Historial Médico')
                    ->required()
                    ->maxLength(500),
                
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->sortable(),
                Tables\Columns\TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\TextColumn::make('fecha_nacimiento')
                    ->label('Fecha de Nacimiento')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('tipo_sangre')
                    ->label('Tipo de Sangre')
                    ->sortable(),
                Tables\Columns\TextColumn::make('genero')
                    ->label('Género')
                    ->sortable(),
                Tables\Columns\TextColumn::make('historial_medico')
                    ->label('Historial Médico')
                    ->limit(50)
                    ->sortable(),
                
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Fecha de Registro')
                    ->dateTime()
                    ->sortable(),
            ])
            ->filters([])
            ->actions([]) // Elimina todas las acciones (sin botón de Edit o New)
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListDonors::route('/'),
            // Se eliminó la ruta 'create' y 'edit' ya que no son necesarias
        ];
    }
}
