
<?php

//namespace App\Filament\Resources;

use App\Filament\Resources\NoticiasResource\Pages;
use App\Models\ImageRecord;
use App\Models\Noticias;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\DateColumn;

class NoticiasResource extends Resource
{
    protected static ?string $model = Noticias::class;
    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    protected static ?string $navigationLabel = 'Notícias';

    protected static ?string $navigationGroup = 'Configurações';
    protected static ?string $pluralLabel = 'Noticiass';
    protected static ?string $modelLabel = 'Noticia';


    // Permitir apenas admin e gestor
    public static function canViewAny(): bool
    {
        return auth()->user()->hasAnyRole(['admin', 'gestor']);
    }

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                TextInput::make('titulo')
                    ->label('Título')
                    ->required()
                    ->maxLength(255),

                Textarea::make('conteudo')
                    ->label('Conteúdo')
                    ->required(),

                DatePicker::make('data_publicacao')
                    ->label('Data de Publicação')
                    ->required(),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('titulo')->sortable()->searchable(),
                DateColumn::make('data_publicacao')->sortable(),
            ])
            ->actions([
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
            'index' => Pages\ListNoticias::route('/'),
            'create' => Pages\CreateNoticias::route('/create'),
            'edit' => Pages\EditNoticias::route('/{record}/edit'),
        ];
    }
}

