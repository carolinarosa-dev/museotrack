<?php

namespace App\Filament\Resources\ConservationStateResource\Pages;

use App\Filament\Resources\ConservationStateResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConservationStates extends ListRecords
{
    protected static string $resource = ConservationStateResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
