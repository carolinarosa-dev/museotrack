<?php

namespace App\Filament\Resources\ArtefactDimensionResource\Pages;

use App\Filament\Resources\ArtefactDimensionResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewArtefactDimension extends ViewRecord
{
    protected static string $resource = ArtefactDimensionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
