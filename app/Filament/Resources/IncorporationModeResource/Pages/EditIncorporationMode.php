<?php

namespace App\Filament\Resources\IncorporationModeResource\Pages;

use App\Filament\Resources\IncorporationModeResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditIncorporationMode extends EditRecord
{
    protected static string $resource = IncorporationModeResource::class;

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
