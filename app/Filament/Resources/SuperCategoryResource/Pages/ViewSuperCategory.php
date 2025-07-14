<?php

namespace App\Filament\Resources\SuperCategoryResource\Pages;

use App\Filament\Resources\SuperCategoryResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewSuperCategory extends ViewRecord
{
    protected static string $resource = SuperCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
