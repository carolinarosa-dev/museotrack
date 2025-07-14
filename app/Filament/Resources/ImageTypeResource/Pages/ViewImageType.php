<?php

namespace App\Filament\Resources\ImageTypeResource\Pages;

use App\Filament\Resources\ImageTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewImageType extends ViewRecord
{
    protected static string $resource = ImageTypeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
