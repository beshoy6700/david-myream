<?php

namespace App\Filament\Imports;

use App\Enums\GenderEnum;
use App\Enums\GuestGroupEnum;
use App\Enums\GuestSourceEnum;
use App\Enums\GuestTitleEnum;
use App\Models\Guest;
use Filament\Actions\Imports\ImportColumn;
use Filament\Actions\Imports\Importer;
use Filament\Actions\Imports\Models\Import;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Number;
use Filament\Forms\Components\Select;

class GuestImporter extends Importer
{
    protected static ?string $model = Guest::class;

    public static function getColumns(): array
    {
        return [
            ImportColumn::make('guest_title')
                ->label('Title'),

            ImportColumn::make('full_name')
                ->requiredMapping()
                ->rules(['required', 'max:255']),

            ImportColumn::make('phone'),

            ImportColumn::make('gender'),

            ImportColumn::make('guest_group'),

            ImportColumn::make('has_reception_invitation'),

            ImportColumn::make('notes'),
        ];
    }

    public function resolveRecord(): ?Guest
    {
        return Guest::firstOrNew([
            'full_name' => trim($this->data['full_name']),
            'phone' => $this->data['phone'] ?: null,
        ]);
    }

    protected function beforeFill(): void
    {

        /*    $this->data['invited_by'] = auth()->id();

        $this->data['guest_source'] =
            $this->options['guest_source'];

        $this->data['is_public'] = false; */

        $this->data['guest_title'] = $this->normalizeTitle(
            $this->data['guest_title'] ?? null
        );

        $this->data['gender'] = $this->normalizeGender(
            $this->data['gender'] ?? null
        );

        $this->data['guest_group'] = $this->normalizeGroup(
            $this->data['guest_group'] ?? null
        );

        $this->data['has_reception_invitation'] =
            $this->normalizeBoolean(
                $this->data['has_reception_invitation'] ?? null
            );
    }

    protected function beforeSave(): void
    {
        $this->record->guest_source =
            GuestSourceEnum::from(
                $this->options['guest_source']
            );

        $this->record->invited_by = auth()->id();

        $this->record->is_public = false;
    }

    protected function normalizeTitle(
        ?string $value
    ): ?string {
        return match (trim((string) $value)) {
            'أ.' => GuestTitleEnum::MR->value,
            'م.' => GuestTitleEnum::ENGINEER->value,
            'د.' => GuestTitleEnum::DOCTOR->value,
            default => null,
        };
    }

    protected function normalizeGender(
        ?string $value
    ): ?string {
        return match (mb_strtolower(trim((string) $value))) {
            'male',
            'm',
            'ذكر',
            'راجل'
            => GenderEnum::MALE->value,

            'female',
            'f',
            'أنثى',
            'ست'
            => GenderEnum::FEMALE->value,

            default => null,
        };
    }

    protected function normalizeGroup(
        ?string $value
    ): string {
        return match (mb_strtolower(trim((string) $value))) {
            'family',
            'العائلة',
            'عائلة'
            => GuestGroupEnum::FAMILY->value,

            'friends',
            'friend',
            'اصدقاء',
            'الأصدقاء'
            => GuestGroupEnum::FRIENDS->value,

            'work',
            'job',
            'العمل'
            => GuestGroupEnum::WORK->value,

            'church',
            'كنيسة',
            'الكنيسة'
            => GuestGroupEnum::CHURCH->value,

            default
            => GuestGroupEnum::PUBLIC->value,
        };
    }
    protected function normalizeBoolean(
        mixed $value
    ): bool {
        return match (mb_strtolower(trim((string) $value))) {
            '1',
            'true',
            'yes',
            'y',
            'نعم',
            'اه',
            'أه' => true,

            default => false,
        };
    }

    public static function getCompletedNotificationBody(
        Import $import
    ): string {
        $body = 'تم استيراد '
            . Number::format($import->successful_rows)
            . ' ضيف بنجاح.';

        if ($failedRowsCount = $import->getFailedRowsCount()) {
            $body .= ' فشل استيراد '
                . Number::format($failedRowsCount)
                . ' سجل.';
        }

        return $body;
    }

    public static function getOptionsFormComponents(): array
    {
        return [
            Select::make('guest_source')
                ->label('Guest Source')
                ->options(GuestSourceEnum::options())
                ->required()
                ->default(GuestSourceEnum::David->value),
        ];
    }
}
