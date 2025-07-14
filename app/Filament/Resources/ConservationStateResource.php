<?php

namespace App\Filament\Resources;

    use App\Filament\Resources\ConservationStateResource\Pages;
    use App\Models\ConservationState;
    use Filament\Forms;
    use Filament\Tables;
    use Filament\Resources\Resource;
    use Filament\Tables\Columns\TextColumn;
    use Filament\Forms\Components\TextInput;
    use Filament\Forms\Components\Placeholder;

class ConservationStateResource extends Resource
{
    protected static ?string $model = ConservationState::class;

    protected static ?string $navigationIcon = 'heroicon-o-shield-check';
    protected static ?string $navigationGroup = 'Configurações';
    protected static ?string $navigationLabel = 'Estado de Conservação';
    protected static ?string $pluralLabel = 'Conservation States';
    protected static ?string $modelLabel = 'Conservation State';

    public static function form(Forms\Form $form): Forms\Form
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

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable(),
                TextColumn::make('creator.name')->label('Criado por')->sortable(),
                TextColumn::make('updater.name')->label('Atualizado por')->sortable(),
                TextColumn::make('created_at')->label('Criado em')->dateTime(),
                TextColumn::make('updated_at')->label('Atualizado em')->dateTime(),
            ])
            ->defaultSort('created_at', 'desc');
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListConservationStates::route('/'),
            'create' => Pages\CreateConservationState::route('/create'),
            'edit' => Pages\EditConservationState::route('/{record}/edit'),
        ];
    }
}
