<?php

namespace App\Filament\Resources\LocationResource\Pages;

use App\Filament\Resources\LocationResource;
use Filament\Actions;
use Filament\Resources\Pages\ViewRecord;
use Filament\Actions\Action;

class ViewLocation extends ViewRecord
{
    protected static string $resource = LocationResource::class;

    protected function getHeaderActions(): array
    {
        return [



            Action::make('Ver no Mapa')
                ->button()
                ->modalHeading('Localização no Google Maps')
                ->modalContent(function ($record) {
                    $query = urlencode($record->location);
                    return view('components.google-map', compact('query'));
                })
                ->modalWidth('xl'),
        ];
    }

}
