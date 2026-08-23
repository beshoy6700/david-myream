<?php

namespace App\Filament\Resources\GuestMessages\Pages;

use App\Filament\Resources\GuestMessages\GuestMessageResource;
use Filament\Actions\EditAction;
use Filament\Resources\Pages\ViewRecord;

class ViewGuestMessage extends ViewRecord
{
    protected static string $resource = GuestMessageResource::class;

    protected function getHeaderActions(): array
    {
        return [
            EditAction::make(),
        ];
    }
}
