<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ConservationStatusResource\Pages;
use App\Filament\Resources\ConservationStatusResource\RelationManagers;
use App\Models\ConservationStatus;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ConservationStatusResource extends Resource
{
    protected static ?string $model = ConservationStatus::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Estado de Conservação';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListConservationStatuses::route('/'),
            'create' => Pages\CreateConservationStatus::route('/create'),
            'edit' => Pages\EditConservationStatus::route('/{record}/edit'),
        ];
    }
}
