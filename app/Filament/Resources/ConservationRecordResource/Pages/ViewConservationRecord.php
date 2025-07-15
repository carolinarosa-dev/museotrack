<?php

namespace App\Filament\Resources\ConservationRecordResource\Pages;

use App\Filament\Resources\ConservationRecordResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewConservationRecord extends ViewRecord
{
    protected static string $resource = ConservationRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
