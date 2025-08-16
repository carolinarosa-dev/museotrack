<?php

namespace App\Filament\Resources;

use App\Filament\Resources\NewsResource\Pages;
use App\Models\News;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class NewsResource extends Resource
{
    protected static ?string $model = News::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $navigationGroup = 'Eventos e Notícias';
    protected static ?string $label = 'Notícia';
    protected static ?string $pluralLabel = 'Notícias';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('titulo')
                    ->label('Título')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Textarea::make('conteudo')
                    ->label('Conteúdo')
                    ->required()
                    ->rows(6),

                Forms\Components\TextInput::make('autor')
                    ->label('Autor')
                    ->required(),

                Forms\Components\DatePicker::make('data_publicacao')
                    ->label('Data de Publicação')
                    ->required(),

                Forms\Components\Toggle::make('publicado')
                    ->label('Publicado')
                    ->default(true),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('titulo')->label('Título')->sortable()->searchable(),
                Tables\Columns\TextColumn::make('autor')->label('Autor')->sortable(),
                Tables\Columns\TextColumn::make('data_publicacao')->label('Data Publicação')->date(),
                Tables\Columns\IconColumn::make('publicado')
                    ->boolean()
                    ->label('Publicado'),
            ])
            ->filters([])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListNews::route('/'),
            'create' => Pages\CreateNews::route('/create'),
            'edit' => Pages\EditNews::route('/{record}/edit'),
        ];
    }

    /** 🔒 Permissões (apenas admin e gestor) */
    public static function canCreate(): bool
    {
        return auth()->user()?->hasAnyRole(['administrador', 'gestor']);
    }

    public static function canEdit($record): bool
    {
        return auth()->user()?->hasAnyRole(['administrador', 'gestor']);
    }

    public static function canDelete($record): bool
    {
        return auth()->user()?->hasAnyRole(['administrador', 'gestor']);
    }

    public static function getModelLabel(): string
    {
        return 'Notícia';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Notícias';
    }
}
