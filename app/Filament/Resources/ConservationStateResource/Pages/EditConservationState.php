<?php

namespace App\Filament\Resources\ConservationStateResource\Pages;

use App\Filament\Resources\ConservationStateResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditConservationState extends EditRecord
{
    protected static string $resource = ConservationStateResource::class;

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
