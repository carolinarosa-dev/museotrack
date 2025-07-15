<?php

namespace App\Filament\Resources\ConservationRecordResource\Pages;

use App\Filament\Resources\ConservationRecordResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConservationRecord extends EditRecord
{
    protected static string $resource = ConservationRecordResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ViewAction::make(),
            Actions\DeleteAction::make(),
            Actions\ForceDeleteAction::make(),
            Actions\RestoreAction::make(),
        ];
    }
}
