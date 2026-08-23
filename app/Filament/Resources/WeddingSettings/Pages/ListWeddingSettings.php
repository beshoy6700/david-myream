<?php

namespace App\Filament\Resources\WeddingSettings\Pages;

use App\Filament\Resources\WeddingSettings\WeddingSettingResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListWeddingSettings extends ListRecords
{
    protected static string $resource = WeddingSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
