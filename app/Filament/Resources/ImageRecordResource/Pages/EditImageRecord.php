<?php

namespace App\Filament\Resources\ImageRecordResource\Pages;

use App\Filament\Resources\ImageRecordResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditImageRecord extends EditRecord
{
    protected static string $resource = ImageRecordResource::class;

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
