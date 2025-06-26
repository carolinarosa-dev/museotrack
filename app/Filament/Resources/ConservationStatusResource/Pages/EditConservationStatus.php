<?php

namespace App\Filament\Resources\ConservationStatusResource\Pages;

use App\Filament\Resources\ConservationStatusResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConservationStatus extends EditRecord
{
    protected static string $resource = ConservationStatusResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
