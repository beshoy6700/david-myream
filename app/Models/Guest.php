<?php

namespace App\Models;

use App\Enums\GenderEnum;
use App\Enums\GuestGroupEnum;
use App\Enums\GuestSourceEnum;
use App\Enums\GuestTitleEnum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Guest extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'full_name',
        'guest_title',
        'greeting_name',
        'sky_name',
        'phone',
        'gender',
        'guest_group',
        'guest_source',
        'has_reception_invitation',
        'is_public',
        'invited_by',
        'notes',
    ];

    protected $casts = [
        'guest_title' => GuestTitleEnum::class,
        'gender' => GenderEnum::class,
        'guest_group' => GuestGroupEnum::class,
        'guest_source' => GuestSourceEnum::class,
        'has_reception_invitation' => 'boolean',
        'is_public' => 'boolean',
    ];

    public function invitationLink(): HasOne
    {
        return $this->hasOne(InvitationLink::class);
    }

    public function rsvp(): HasOne
    {
        return $this->hasOne(Rsvp::class);
    }

    public function messages(): HasMany
    {
        return $this->hasMany(GuestMessage::class);
    }

    public function invitedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'invited_by');
    }

    public function getAiNameAttribute(): string
    {
        return $this->greeting_name ?: $this->full_name;
    }

    public function getSkyDisplayNameAttribute(): string
    {
        return $this->sky_name ?: $this->full_name;
    }

    public function getFullGreetingAttribute(): string
    {
        if ($this->guest_title) {
            return $this->guest_title->value . ' ' . $this->ai_name;
        }

        return $this->ai_name;
    }

    public function getInvitationUrlAttribute(): ?string
    {
        return $this->invitationLink
            ? url('/invite/' . $this->invitationLink->token)
            : null;
    }

    public function getInvitationTypeAttribute(): string
    {
        return $this->has_reception_invitation
            ? 'church_and_reception'
            : 'church_only';
    }

    public function getFormalNameAttribute(): string
    {
        if ($this->guest_title) {

            return $this->guest_title->value . ' ' . $this->full_name;
        }

        return $this->full_name;
    }

    public function getWhatsappMessageAttribute(): string
    {
        $greeting = "{$this->formal_name}،";
        //  $gender = $this->gender?->value;

        $specialLine = match ($this->gender) {
            GenderEnum::MALE => "ولأن وجودك يسعدنا،",
            GenderEnum::FEMALE => "ولأن وجودكِ يسعدنا،",
            default => "ولأن وجودكم يسعدنا،",
        };

        $joyLine = match ($this->gender) {
            GenderEnum::MALE => "يسعدنا أن تكون جزءًا من فرحتنا. ❤️",
            GenderEnum::FEMALE => "يسعدنا أن تكوني جزءًا من فرحتنا. ❤️",
            default => "يسعدنا أن تكونوا جزءًا من فرحتنا. ❤️",
        };

        return implode("\n", [

            "❤️",

            $greeting,

            "",

            "لكل شخص مكانة خاصة في حياتنا...",

            $specialLine,

            "",

            $joyLine,

            "",

            "✨ اضغط لفتح دعوتك الشخصية",

            "",

            $this->invitation_url,

            "",

            "ننتظرك بكل الحب 💍",

            "بيشوي & جولي",
        ]);
    }
}
