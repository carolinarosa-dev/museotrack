<?php

namespace App\Filament\Resources\SuperCategoryResource;

use App\Models\SuperCategory;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class SuperCategoryResource extends Resource
{
    protected static ?string $model = SuperCategory::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Super Categoria';

    protected static ?string $slug = 'museu/supercategorias';

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
            'index' => Pages\ListSuperCategories::route('/'),
            'create' => Pages\CreateSuperCategory::route('/create'),
            'edit' => Pages\EditSuperCategory::route('/{record}/edit'),
        ];
    }
}
