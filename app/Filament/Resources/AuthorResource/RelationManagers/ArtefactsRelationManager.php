<?php

namespace App\Filament\Resources\AuthorResource\RelationManagers;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;


class ArtefactsRelationManager extends RelationManager
{

    protected static string $relationship = 'artefacts';

    protected static ?string $title = 'Artefactos'; // título no topo
    protected static ?string $label = 'Artefacto';  // singular
    protected static ?string $pluralLabel = 'Artefactos'; // plural
    protected static ?string $recordTitleAttribute = 'denomination';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('reference')->required(),
                Forms\Components\TextInput::make('denomination')->required(),
                Forms\Components\DatePicker::make('incorporation_date'),
            ]);
    }

    public function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('reference')->label('Referência'),
                TextColumn::make('denomination')->label('Denominação'),
                TextColumn::make('incorporation_date')->label('Data Incorporação')->date(),
            ])
            ->headerActions([
                Tables\Actions\AttachAction::make()
                    ->mutateFormDataUsing(function (array $data): array {
                        $data['created_by'] = auth()->id();
                        return $data;
                    }),
                Tables\Actions\CreateAction::make()
                    ->mutateFormDataUsing(function (array $data): array {
                        $data['created_by'] = auth()->id();
                        return $data;
                    }),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DetachBulkAction::make()

            ]);
    }
}
