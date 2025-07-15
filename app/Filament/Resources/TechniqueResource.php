<?php

namespace App\Filament\Resources;

use App\Filament\Resources\TechniqueResource\Pages;
use App\Filament\Resources\TechniqueResource\RelationManagers;
use App\Models\Technique;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class TechniqueResource extends Resource
{
    protected static ?string $model = Technique::class;
    protected static ?string $navigationIcon = 'heroicon-o-scissors';

    protected static ?string $navigationGroup = 'Configurações';
    protected static ?string $modelLabel = 'Technique';

    protected static ?string $navigationLabel = 'Técnica';
    protected static ?string $pluralLabel = 'Techniques';


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nome')
                    ->required()
                    ->maxLength(255)


            ]);
            }


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')
                    ->label('Nome')
                    ->searchable(),
                TextColumn::make('creator.name')
                    ->label('Criado por')
                    ->sortable(),
                TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime()->sortable(),

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
            'index' => Pages\ListTechniques::route('/'),
            'create' => Pages\CreateTechnique::route('/create'),
            'view' => Pages\ViewTechnique::route('/{record}'),
            'edit' => Pages\EditTechnique::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function getModelLabel(): string
    {
        return 'Técnica';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Técnicas';
    }
}
