<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ArtifactResource\Pages;
use App\Filament\Resources\ArtifactResource\RelationManagers;
use App\Models\Artifact;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Notifications\Notification;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ArtifactResource extends Resource
{
    protected static ?string $model = Artifact::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube-transparent';
    protected static ?string $navigationLabel = 'Artefacto';
    protected static ?string $modelLabel = 'Artefacto';
    protected static ?string $pluralModelLabel = 'Artefactos';



    public static function form(Form $form): Form
    {

        return $form
            //->columns(1)
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nome')
                    ->required()
                    ->maxLength(255),


                Forms\Components\TextInput::make('reference')
                    ->label('Referencia')
                    ->required()
                    ->maxLength(255),

                Forms\Components\FileUpload::make('image')
                    ->label('Imagem')
                    ->image()
                    ->imageEditor()
                    ->directory('artifacts'),


                Forms\Components\RichEditor::make('description')
                    ->label('Descrição')
                    ->columnSpanFull(),

                Forms\Components\RichEditor::make('author')
                    ->label('Autor')
                    ->columnSpanFull(),


                Forms\Components\Toggle::make('active')
                    ->required()
                    ->label('Visivel.')
                    ->default(true)

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                Tables\Columns\TextColumn::make('id')
                    ->label('ID')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('reference')
                    ->default('OR-' . random_int(100000, 999999))
                    ->disabled()
                    ->label('Referencia')
                    ->searchable()
                    ->sortable(),


                Tables\Columns\TextColumn::make('name')
                    ->label('Nome')
                    ->searchable()
                    ->sortable(),


                Tables\Columns\ImageColumn::make('image')
                    ->label('Imagem'),

                Tables\Columns\TextColumn::make('author_id')
                    ->label('Autor')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('category')
                    ->label('Categoria')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('history')
                    ->label('Historial')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('technique')
                    ->label('Técnica')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('workshop_or_manufacturer')
                    ->label('Oficina/Fabricante')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('material')
                    ->label('Material')
                    ->searchable()
                    ->sortable(),


                Tables\Columns\TextColumn::make('created_at')
                    ->searchable()
                    ->sortable(),
                Tables\Columns\ToggleColumn::make('active')
                    ->label('Visivel'),

                Tables\Columns\TextColumn::make('updated_at')
                    ->label('Última atualização')
                    ->date(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])

            ->groupedBulkActions([
                Tables\Actions\DeleteBulkAction::make()
                    ->action(function () {
                        Notification::make()
                            ->title('Now, now, don\'t be cheeky, leave some records for others to play with!')
                            ->warning()
                            ->send();
                    }),
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
            'index' => Pages\ListArtifacts::route('/'),
            'create' => Pages\CreateArtifact::route('/create'),
            'edit' => Pages\EditArtifact::route('/{record}/edit'),
        ];
    }
}
