<?php

namespace App\Filament\Resources\ImageRecordResource\Pages;

use App\Filament\Resources\ImageRecordResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListImageRecords extends ListRecords
{
    protected static string $resource = ImageRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
