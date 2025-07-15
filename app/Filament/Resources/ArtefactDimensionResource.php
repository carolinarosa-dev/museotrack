<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArtefactDimensionResource\Pages;
use App\Filament\Resources\ArtefactDimensionResource\RelationManagers;
use App\Models\ArtefactDimension;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArtefactDimensionResource extends Resource
{
    protected static ?string $model = ArtefactDimension::class;

    protected static ?string $navigationIcon = 'heroicon-o-pencil';

    protected static ?string $navigationGroup = 'Configurações';
    protected static ?string $navigationLabel = 'Dimensões';
    protected static ?string $pluralLabel = 'Artefact Dimensions';
    protected static ?string $modelLabel = 'Artefact Dimension';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('artefact_id')
                    ->label('Artefacto')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('height')
                    ->label('Altura (cm)')
                    ->numeric(),
                Forms\Components\TextInput::make('width')
                    ->label('Largura (cm)')
                    ->numeric(),
                Forms\Components\TextInput::make('length')
                    ->label('Comprimento (cm)')
                    ->numeric(),
                Forms\Components\TextInput::make('depth')
                    ->label('Profundidade')
                    ->numeric(),
                Forms\Components\TextInput::make('thickness')
                    ->label('Espessura')
                    ->numeric(),
                Forms\Components\TextInput::make('diameter')
                    ->label('Diametro (cm)')
                    ->numeric(),
                Forms\Components\TextInput::make('weight')
                    ->label('Peso (gr)')
                    ->numeric(),
                Forms\Components\TextInput::make('capacity')
                    ->label('Capacidade')
                    ->numeric(),
                Forms\Components\Textarea::make('other_data')
                    ->label('Outra Data')
                    ->columnSpanFull(),
                Forms\Components\TextInput::make('created_by')
                    ->label('Criado por')
                    ->required()
                    ->numeric(),
                Forms\Components\TextInput::make('updated_by')
                    ->label('Atualizado por')
                    ->numeric(),
                Forms\Components\TextInput::make('deleted_by')
                    ->label('Excluido por')
                    ->numeric(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('artefact_id')
                    ->label('Artefacto')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('height')
                    ->label('Altura (cm)')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('width')
                    ->label('Largura (cm)')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('length')
                    ->label('Comprimento (cm)')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('depth')
                    ->label('Profundidade')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('thickness')
                    ->label('Espessura')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('diameter')
                    ->label('Diametro (cm)')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('weight')
                    ->label('Peso (gr)')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('capacity')
                    ->label('Capacidade')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_by')
                    ->label('Criado por')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('updated_by')
                    ->label('Atualizado por')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('deleted_by')
                    ->label('Excluido por')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Criado em')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Atualizado em')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('deleted_at')
                    ->label('Eliminado em')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
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
            'index' => Pages\ListArtefactDimensions::route('/'),
            'create' => Pages\CreateArtefactDimension::route('/create'),
            'view' => Pages\ViewArtefactDimension::route('/{record}'),
            'edit' => Pages\EditArtefactDimension::route('/{record}/edit'),
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
        return 'Dimensões';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Dimensões';
    }

}
