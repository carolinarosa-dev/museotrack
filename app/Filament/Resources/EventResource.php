<?php


namespace App\Filament\Resources;

use App\Filament\Resources\EventResource\Pages;
use App\Models\Event;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Facades\Auth;

class EventResource extends Resource
{
    protected static ?string $model = Event::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Eventos e Notícias';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('titulo')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Textarea::make('descricao')
                    ->columnSpanFull(),
                Forms\Components\DatePicker::make('data_inicio')
                    ->required(),
                Forms\Components\DatePicker::make('data_fim'),
                Forms\Components\TextInput::make('autor')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('publicado')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('titulo')->searchable(),
                Tables\Columns\TextColumn::make('data_inicio')->date()->sortable(),
                Tables\Columns\TextColumn::make('data_fim')->date()->sortable(),
                Tables\Columns\TextColumn::make('autor')->searchable(),
                Tables\Columns\IconColumn::make('publicado')->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(), // <-- Aqui adicionamos
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

/*    public static function canCreate(): bool
    {
        $user = Auth::user();
        // Permitir criação apenas para 'administrador' ou 'gestor'
        return in_array($user->role, ['administrador', 'gestor']);
    }*/

    public static function canCreate(): bool
    {
        return auth()->user()->hasRole(['administrador', 'gestor']);
    }

    public static function canDelete($record): bool
    {
        return auth()->user()->hasRole(['administrador', 'gestor']);
    }

    public static function canEdit($record): bool
    {
        return auth()->user()->hasRole(['administrador', 'gestor']);
    }


    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListEvents::route('/'),
            'create' => Pages\CreateEvent::route('/create'),
            'view' => Pages\ViewEvent::route('/{record}'),
            'edit' => Pages\EditEvent::route('/{record}/edit'),
        ];
    }
}

