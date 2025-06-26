<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ImageRecordResource\Pages;
use App\Filament\Resources\ImageRecordResource\RelationManagers;
use App\Models\ImageRecord;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ImageRecordResource extends Resource
{
    protected static ?string $model = ImageRecord::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Registo Fotográfico';

    protected static ?string $slug = 'museu/imagens';

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
            'index' => Pages\ListImageRecords::route('/'),
            'create' => Pages\CreateImageRecord::route('/create'),
            'edit' => Pages\EditImageRecord::route('/{record}/edit'),
        ];
    }
}
