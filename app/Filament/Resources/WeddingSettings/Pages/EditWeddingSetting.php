<?php

namespace App\Filament\Resources\WeddingSettings\Pages;

use App\Filament\Resources\WeddingSettings\WeddingSettingResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\ViewAction;
use Filament\Resources\Pages\EditRecord;

class EditWeddingSetting extends EditRecord
{
    protected static string $resource = WeddingSettingResource::class;

    protected function getHeaderActions(): array
    {
        return [
            ViewAction::make(),
            DeleteAction::make(),
        ];
    }
}
