<?php
namespace App\Filament\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Filament\Resources\ArtefactResource\Pages;
use App\Models\Artefact;
use App\Models\SuperCategory;
use App\Models\Author;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Components\Select;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Facades\Auth;
use Filament\Tables\Actions\Action;
use App\Models\Event;





class ArtefactResource extends Resource
{
    protected static ?string $model = Artefact::class;

    protected static ?string $navigationIcon = 'heroicon-o-cube';

    protected static ?string $navigationLabel = 'Artefactos';
    protected static ?string $pluralLabel = 'Artefacts';
    protected static ?string $modelLabel = 'Artefact';



    public static function form(Forms\Form $form): Forms\Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('reference')
                    ->label('Referência')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('denomination')
                    ->label('Denominação')
                    ->required()
                    ->maxLength(255),

                Forms\Components\TextInput::make('dating')
                    ->label('Datação')
                    ->nullable(),

                Forms\Components\Textarea::make('description')
                    ->label('Descrição'),

                Forms\Components\Textarea::make('origin')
                    ->label('Origem'),

                Forms\Components\Textarea::make('bibliography')
                    ->label('Biografia'),

                Forms\Components\DatePicker::make('incorporation_date')
                    ->label('Incoporação'),

                Forms\Components\Select::make('incorporation_mode_id')
                    ->relationship('incorporationMode', 'name')
                    ->label('Modo de Incorporação')
                    ->nullable(),

                Forms\Components\FileUpload::make('photos')
                    ->label('Fotos')
                    ->multiple()
                    ->directory('artefact-photos')
                    ->reorderable(),

                Forms\Components\Select::make('super_categories')
                    ->label('Super Categoria')
                    ->multiple()
                    ->relationship('superCategories', 'name')
                    ->preload()
                    ->nullable(),

                Forms\Components\Select::make('authors')
                    ->label('Autor')
                   // ->multiple()
                    ->relationship('authors', 'name')
                  //  ->preload()
                    ->nullable(),

                Forms\Components\Select::make('workshops')
                    ->label('Oficina/Fabricante')
                    ->relationship('workshops', 'name')
                    ->multiple()
                    ->preload(),
                Forms\Components\Select::make('materials')
                    ->label('Material')
                    ->label('Materials')
                    ->relationship('materials', 'name')
                    ->multiple()
                    ->preload(),

                Forms\Components\Select::make('techniques')
                    ->label('Técnica')
                    ->relationship('techniques', 'name')
                    ->multiple()
                    ->preload(),

            ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('reference')->searchable()->label('Referência'),
                Tables\Columns\ImageColumn::make('photos')->label('Imagem'),
                Tables\Columns\TextColumn::make('denomination')->searchable()->label('Denominação'),
                Tables\Columns\TextColumn::make('incorporationMode.name')->label('Modo de Incorporação'),
                Tables\Columns\TextColumn::make('superCategories')
                    ->label('Super Categoria')
                    ->formatStateUsing(fn($state, $record) => $record->superCategories->pluck('name')->join(', ')
                    )
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('authors')
                    ->label('Autor')
                    ->formatStateUsing(fn($state, $record) => $record->authors->pluck('name')->join(', ')
                    )
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('workshops')
                    ->label('Oficina/Fabricante')
                    ->formatStateUsing(fn($state, $record) => $record->workshops->pluck('name')->join(', ')
                    )
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('created_at')->dateTime()
                ->label('Criado em'),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make(),
            ])

            ->headerActions([
                Action::make('exportar_csv')
                    ->label('Exportar Inventário CSV')
                    ->color('success')
                    ->icon('heroicon-o-arrow-down-tray')
                    ->url(route('export.inventario'))
                    ->openUrlInNewTab(),
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
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListArtefacts::route('/'),
            'create' => Pages\CreateArtefact::route('/create'),
            'edit' => Pages\EditArtefact::route('/{record}/edit'),
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

    /**
     * Depois de criar
     */
    public static function afterCreate($record): void
    {
        // Super Categories
        $superCategories = request()->input('super_categories', []);
        if (!empty($superCategories)) {
            $pivotData = [];
            foreach ($superCategories as $superCategoryId) {
                $pivotData[$superCategoryId] = ['created_by' => Auth::id()];
            }
            $record->superCategories()->sync($pivotData);
        }

        // Authors
        $authors = request()->input('authors', []);
        if (!empty($authors)) {
            $pivotData = [];
            foreach ($authors as $authorId) {
                $pivotData[$authorId] = ['created_by' => Auth::id()];
            }
            $record->authors()->sync($pivotData);
        }
    }

/**
     * Depois de atualizar
     */
    public static function afterSave($record): void
    {
        // Super Categories
        $superCategories = request()->input('super_categories', []);
        if (!empty($superCategories)) {
            $pivotData = [];
            foreach ($superCategories as $superCategoryId) {
                $pivotData[$superCategoryId] = ['updated_by' => Auth::id()];
            }
            $record->superCategories()->sync($pivotData);
        }

        // Authors
        $authors = request()->input('authors', []);
        if (!empty($authors)) {
            $pivotData = [];
            foreach ($authors as $authorId) {
                $pivotData[$authorId] = ['updated_by' => Auth::id()];
            }
            $record->authors()->sync($pivotData);
        }
    }

        public static function getModelLabel(): string
    {
        return 'Artefacto';
    }

        public static function getPluralModelLabel(): string
    {
        return 'Artefactos';
    }


   public static function canEdit(Model $record): bool
    {
        return auth()->user()->hasAnyRole(['administrador', 'gestor']);
    }

    public static function canDelete(Model $record): bool
    {
        return auth()->user()->hasAnyRole(['administrador', 'gestor']);
    }


}


