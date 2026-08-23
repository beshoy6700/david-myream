<?php

namespace App\Filament\Resources\Guests\Pages;

use App\Filament\Imports\GuestImporter;
use App\Filament\Resources\Guests\GuestResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGuests extends ListRecords
{
    protected static string $resource = GuestResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\ImportAction::make()
                ->importer(GuestImporter::class)
                ->color('success'),

            Actions\CreateAction::make(),
        ];
    }
}