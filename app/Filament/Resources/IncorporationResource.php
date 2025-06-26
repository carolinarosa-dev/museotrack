<?php

namespace App\Filament\Resources;

use App\Filament\Resources\IncorporationResource\Pages;
use App\Filament\Resources\IncorporationResource\RelationManagers;
use App\Models\Incorporation;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class IncorporationResource extends Resource
{
    protected static ?string $model = Incorporation::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Incorporação';

    protected static ?string $slug = 'museu/incorporacao';

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
            'index' => Pages\ListIncorporations::route('/'),
            'create' => Pages\CreateIncorporation::route('/create'),
            'edit' => Pages\EditIncorporation::route('/{record}/edit'),
        ];
    }
}
