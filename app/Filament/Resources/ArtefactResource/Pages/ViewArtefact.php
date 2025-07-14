<?php

namespace App\Filament\Resources\ArtefactResource\Pages;

use App\Filament\Resources\ArtefactResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewArtefact extends ViewRecord
{
    protected static string $resource = ArtefactResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
