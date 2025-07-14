<?php

namespace App\Filament\Resources\IncorporationModeResource\Pages;

use App\Filament\Resources\IncorporationModeResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListIncorporationModes extends ListRecords
{
    protected static string $resource = IncorporationModeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
