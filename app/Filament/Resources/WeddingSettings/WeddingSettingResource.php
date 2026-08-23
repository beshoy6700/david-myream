<?php

namespace App\Filament\Resources\WeddingSettings;

use App\Filament\Resources\WeddingSettings\Pages\CreateWeddingSetting;
use App\Filament\Resources\WeddingSettings\Pages\EditWeddingSetting;
use App\Filament\Resources\WeddingSettings\Pages\ListWeddingSettings;
use App\Filament\Resources\WeddingSettings\Pages\ViewWeddingSetting;
use App\Filament\Resources\WeddingSettings\Schemas\WeddingSettingForm;
use App\Filament\Resources\WeddingSettings\Schemas\WeddingSettingInfolist;
use App\Filament\Resources\WeddingSettings\Tables\WeddingSettingsTable;
use App\Models\WeddingSetting;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class WeddingSettingResource extends Resource
{
    protected static ?string $model = WeddingSetting::class;

    protected static ?string $navigationLabel = 'Wedding Settings';


    protected static ?string $modelLabel = 'Wedding Settings';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    public static function canCreate(): bool
    {
        return static::getModel()::count() === 0;
    }

    public static function form(Schema $schema): Schema
    {
        return WeddingSettingForm::configure($schema);
    }

    public static function infolist(Schema $schema): Schema
    {
        return WeddingSettingInfolist::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return WeddingSettingsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListWeddingSettings::route('/'),
            'create' => CreateWeddingSetting::route('/create'),
            'view' => ViewWeddingSetting::route('/{record}'),
            'edit' => EditWeddingSetting::route('/{record}/edit'),
        ];
    }
}