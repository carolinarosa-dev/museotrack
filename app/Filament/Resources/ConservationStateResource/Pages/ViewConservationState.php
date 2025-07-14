<?php

namespace App\Filament\Resources\ConservationStateResource\Pages;

use App\Filament\Resources\ConservationStateResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewConservationState extends ViewRecord
{
    protected static string $resource = ConservationStateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
