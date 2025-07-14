<?php

namespace App\Filament\Resources\ArtefactResource\Pages;

use App\Filament\Resources\ArtefactResource;
use Filament\Resources\Pages\EditRecord;

class EditArtefact extends EditRecord
{
    protected static string $resource = ArtefactResource::class;

    protected function afterSave(): void
    {
        if (isset($this->data['super_categories'])) {
            $syncData = [];
            foreach ($this->data['super_categories'] as $superCategoryId) {
                $syncData[$superCategoryId] = ['created_by' => auth()->id()];
            }
            $this->record->superCategories()->sync($syncData);
        }
    }
}
