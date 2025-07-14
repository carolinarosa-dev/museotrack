<?php

namespace App\Filament\Resources\IncorporationModeResource\Pages;

use App\Filament\Resources\IncorporationModeResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;

class ViewIncorporationMode extends ViewRecord
{
    protected static string $resource = IncorporationModeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\EditAction::make(),
        ];
    }
}
