<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SuperCategoryResource\Pages;
use App\Models\SuperCategory;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Auth;  // <-- Importa o Auth corretamente

class SuperCategoryResource extends Resource
{
    protected static ?string $model = SuperCategory::class;
    protected static ?string $navigationIcon = 'heroicon-o-shield-check';

    protected static ?string $navigationLabel = 'Super Categoria';

    protected static ?string $pluralLabel = 'Supercategories';

    protected static ?string $modelLabel = 'Supercategory';


    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->label('Nome')
                    ->required()
                    ->maxLength(255),
            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('name')->sortable()->searchable()->label('Nome'),
                TextColumn::make('creator.name')->label('Criado por')->sortable(),
                TextColumn::make('created_at')->label('Criado em')->dateTime()->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListSuperCategories::route('/'),
            'create' => Pages\CreateSuperCategory::route('/create'),
            'edit' => Pages\EditSuperCategory::route('/{record}/edit'),
        ];
    }

    protected static function mutateFormDataBeforeCreate(array $data): array
    {
        $data['created_by'] = Auth::id();
        return $data;
    }

    protected static function mutateFormDataBeforeSave(array $data): array
    {
        $data['updated_by'] = Auth::id();
        return $data;
    }

    public static function getModelLabel(): string
    {
        return 'Super Categoria';
    }

    public static function getPluralModelLabel(): string
    {
        return 'Super Categorias';
    }
}

