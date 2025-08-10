<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AuthorResource\Pages;
use App\Models\Author;
use App\Models\Artefact;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use App\Filament\Resources\AuthorResource\RelationManagers\ArtefactsRelationManager;

class AuthorResource extends Resource
{
    protected static ?string $model = Author::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationLabel = 'Autores';
    protected static ?string $pluralLabel = 'Autores';
    protected static ?string $modelLabel = 'Author';


    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nome')
                    ->required()
                    ->maxLength(255),

                Forms\Components\FileUpload::make('photo')
                    ->label('Fotografia')
                    ->image()
                    ->directory('author-photos')
                    ->nullable(),

                Forms\Components\DatePicker::make('birth_date')
                    ->label('Data de Nascimento')
                    ->nullable(),

                Forms\Components\DatePicker::make('death_date')
                    ->label('Data de Falecimento')
                    ->nullable(),

                Forms\Components\Textarea::make('bibliography')
                    ->label('Biografia')
                    ->nullable(),

                Forms\Components\Textarea::make('address')
                    ->label('Morada')
                    ->nullable(),

                // Contacts como campo JSON: pede array de type e value
                Forms\Components\Repeater::make('contacts')
                    ->label('Contactos')
                    ->schema([
                        Forms\Components\Select::make('type')
                            ->label('Tipo')
                            ->options([
                                'tlm' => 'Telemóvel',
                                'email' => 'Email',
                                'phone' => 'Telefone',
                                'fax' => 'Fax',
                            ])
                            ->required(),
                        Forms\Components\TextInput::make('value')
                            ->required()
                            ->maxLength(255),
                    ])
                    ->columnSpan('full')
                    ->minItems(1)
                    ->nullable(),

                // Relação artefactos
                Forms\Components\Select::make('artefacts')
                    ->relationship('artefacts', 'denomination')
                    ->preload()
                    ->label('Artefactos relacionados')
                    ->multiple(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name')->searchable()->sortable()->label('Nome'),
                Tables\Columns\ImageColumn::make('photo')->label('Foto'),
                Tables\Columns\TextColumn::make('birth_date')->date()->sortable()->label('Data de Nascimento'),
                Tables\Columns\TextColumn::make('death_date')->date()->sortable()->label('Data de Falecimento'),
                Tables\Columns\TextColumn::make('bibliography')->limit(50)->wrap()->label('Biografia'),
                Tables\Columns\TextColumn::make('address')->limit(50)->wrap()->label('Morada'),
                Tables\Columns\TextColumn::make('contacts')
                    ->label('Contactos')
                    ->formatStateUsing(fn($state) => collect(json_decode($state, true) ?? [])
                        ->filter(fn($c) => is_array($c) && isset($c['type'], $c['value']))
                        ->map(fn($c) => "{$c['type']}: {$c['value']}")
                        ->join(', ')
                    ),

                Tables\Columns\TextColumn::make('artefacts')
                    ->label('Artefactos')
                    ->formatStateUsing(fn($record) => $record->artefacts->pluck('denomination')->join(', '))
                    ->wrap(),

                Tables\Columns\TextColumn::make('created_at')->label('Criado em')->dateTime()->sortable(),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
                Tables\Actions\RestoreAction::make(),
                Tables\Actions\ForceDeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
                Tables\Actions\RestoreBulkAction::make(),
                Tables\Actions\ForceDeleteBulkAction::make(),
            ]);
    }



    public static function getRelations(): array
    {
        return [
            ArtefactsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListAuthors::route('/'),
            'create' => Pages\CreateAuthor::route('/create'),
            'edit' => Pages\EditAuthor::route('/{record}/edit'),
        ];
    }

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->withoutGlobalScopes([
                SoftDeletingScope::class,
            ]);
    }

    public static function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = Auth::id();
        return $data;
    }

    public static function mutateFormDataBeforeSave(array $data): array
    {
        $data['updated_by'] = Auth::id();
        return $data;
    }

    public static function getModelLabel(): string
    {
        return 'Autor';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Autores';
    }

}
