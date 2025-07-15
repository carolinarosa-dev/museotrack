<?php

namespace App\Filament\Resources\ArtefactDimensionResource\Pages;

use App\Filament\Resources\ArtefactDimensionResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditArtefactDimension extends EditRecord
{
    protected static string $resource = ArtefactDimensionResource::class;

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
