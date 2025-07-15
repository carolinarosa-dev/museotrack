<?php

namespace App\Filament\Resources\ConservationRecordResource\Pages;

use App\Filament\Resources\ConservationRecordResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListConservationRecords extends ListRecords
{
    protected static string $resource = ConservationRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
