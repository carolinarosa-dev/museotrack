<?php

namespace App\Filament\Resources\ImageTypeResource\Pages;

use App\Filament\Resources\ImageTypeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditImageType extends EditRecord
{
    protected static string $resource = ImageTypeResource::class;

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
