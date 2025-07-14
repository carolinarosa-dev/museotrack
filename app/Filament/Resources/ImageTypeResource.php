<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ImageTypeResource\Pages;
use App\Filament\Resources\ImageTypeResource\RelationManagers;
use App\Models\ImageType;
use Filament\Forms;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ImageTypeResource extends Resource
{
    protected static ?string $model = ImageType::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Configurações';
    protected static ?string $navigationLabel = 'Tipo de Imagens';
    protected static ?string $pluralLabel = 'Type Images';
    protected static ?string $modelLabel = 'Type Image';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                    ->required()
                    ->maxLength(255),

                Placeholder::make('created_by')
                    ->label('Criado por')
                    ->content(fn ($record) => $record?->creator?->name ?? '-'),

                Placeholder::make('updated_by')
                    ->label('Última atualização por')
                    ->content(fn ($record) => $record?->updater?->name ?? '-'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('creator.name')->label('Criado por')->sortable(),
                TextColumn::make('updater.name')->label('Atualizado por')->sortable(),
                TextColumn::make('created_at')->label('Criado em')->dateTime(),
                TextColumn::make('updated_at')->label('Atualizado em')->dateTime(),
            ])
            ->defaultSort('created_at', 'desc')
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                    Tables\Actions\ForceDeleteBulkAction::make(),
                    Tables\Actions\RestoreBulkAction::make(),
                ])
            ]);
    }



    public static function getPages(): array
    {
        return [
            'index' => Pages\ListImageTypes::route('/'),
            'create' => Pages\CreateImageType::route('/create'),
            'view' => Pages\ViewImageType::route('/{record}'),
            'edit' => Pages\EditImageType::route('/{record}/edit'),
        ];
    }

    /*public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }*/

    public static function getModelLabel(): string
    {
        return 'Tipo de Imagem';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Tipos de Imagem';
    }

}
