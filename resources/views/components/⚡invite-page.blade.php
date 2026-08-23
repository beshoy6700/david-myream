<?php

namespace App\View\Components;

use App\Models\InvitationLink;
use Livewire\Component;
use App\Models\WeddingSetting;
use App\Enums\GuestGroupEnum;
use App\Enums\GuestSourceEnum;
use App\Models\Guest;
use Illuminate\Validation\Rule;

new class extends Component
{
    public ?string $token = null;

    public ?InvitationLink $invitation = null;

    public ?WeddingSetting $settings = null;

    public bool $openingEnvelope = false;

    public bool $openingAnimation = false;

    public string $locale = 'ar';

    public ?Guest $guest = null;

    public bool $isPublic = false;

    public string $weddingDate;

    public string $rsvpStatus = '';

    public int $attendeesCount = 1;

    public string $rsvpNotes = '';

    public string $stage = 'cover';

    public bool $showSuccess = false;

    public bool $isEditing = false;

    public bool $showMemoryModal = false;

    public string $memoryMessage = '';

    public bool $hasMemoryMessage = false;

    public bool $showGuestModal = false;

    public string $publicName = '';

    public string $publicPhone = '';

    public bool $showInvitationReady = false;

  public function mount(?string $token = null): void
{
    $this->settings = WeddingSetting::query()->first();

    $this->token = $token;

    $this->locale = session('locale', 'ar');

    $this->weddingDate = $this->settings
        ->wedding_date
        ->toIso8601String();

    /*
    |--------------------------------------------------------------------------
    | Public Invitation
    |--------------------------------------------------------------------------
    */

    if (! $token) {

        $this->isPublic = true;

        return;
    }

    /*
    |--------------------------------------------------------------------------
    | Guest Invitation
    |--------------------------------------------------------------------------
    */

    $this->invitation = InvitationLink::query()
        ->with([
            'guest.rsvp',
            'guest.messages',
        ])
        ->where('token', $token)
        ->firstOrFail();

    $this->guest = $this->invitation->guest;

    /*
    |--------------------------------------------------------------------------
    | RSVP
    |--------------------------------------------------------------------------
    */

    $rsvp = $this->guest->rsvp;

    if ($rsvp) {

        $this->rsvpStatus = $rsvp->status;

        $this->attendeesCount =
            $rsvp->confirmed_attendees_count ?? 1;

        $this->rsvpNotes =
            $rsvp->notes ?? '';

        $this->showSuccess = true;
    }

    /*
    |--------------------------------------------------------------------------
    | Memory
    |--------------------------------------------------------------------------
    */

    $message = $this->guest
        ->messages()
        ->latest()
        ->first();

    if ($message) {

        $this->memoryMessage =
            $message->message;

        $this->memorySaved =
            $this->guest
                ->messages()
                ->exists();

        $this->hasMemoryMessage = true;
    }
}

public function setLocale(
    string $locale
): void {

    $this->locale = $locale;

    session([
        'locale' => $locale
    ]);

    app()->setLocale($locale);
}
public function editRsvp(): void
{
    $this->showSuccess = false;

    $this->isEditing = true;
}
public function continueAsPublicGuest()
{
    $this->validate([

        'publicName' => [
            'required',
            'string',
            'min:3',
            'max:255',
        ],

        'publicPhone' => [
            'required',
            'regex:/^01[0125][0-9]{8}$/',
        ],

    ]);

    $guest = Guest::query()
        ->where('phone', $this->publicPhone)
        ->first();

    if (! $guest) {

        $guest = Guest::create([

            'full_name' => $this->publicName,

            'phone' => $this->publicPhone,

            'guest_group' => GuestGroupEnum::PUBLIC,

            'guest_source' => GuestSourceEnum::PUBLIC,

            'is_public' => true,

        ]);
    }
    $this->guest = $guest;

$this->invitation = $guest->invitationLink;

$this->showGuestModal = false;

$this->showMemoryModal = true;

$this->publicName = '';

$this->publicPhone = '';

   /*  $this->redirect(
        $guest->invitation_url,
        navigate: true
    ); */
}
public function openInvitation(): void
{
    $this->openingEnvelope = true;

    $this->openingAnimation = true;

    if (! $this->invitation) {
        return;
    }

    $this->invitation->increment('visits_count');

    $data = [
        'last_visited_at' => now(),
    ];

    if (! $this->invitation->opened_at) {
        $data['opened_at'] = now();
    }

    $this->invitation->update($data);

    $this->invitation->refresh();
}

    public function showTransition(): void
{
    $this->stage = 'transition';
}
public function showInvitation(): void
{
    $this->stage = 'invitation';
}
   public function submitRsvp(): void
{
    $rsvp = $this->invitation
        ->guest
        ->rsvp()
        ->updateOrCreate(
            [],
            [
                'status' => $this->rsvpStatus,

                'confirmed_attendees_count' =>
                    $this->attendeesCount,

                'notes' =>
                    $this->rsvpNotes,

                'responded_at' =>
                    now(),
            ]
        );

    $this->showSuccess = true;

    $this->isEditing = false;
}

/* public function submitMemory(): void
{
    $this->validate([
        'memoryMessage' => [
            'required',
            'string',
            'min:3',
            'max:500',
        ],
    ]);

    if (
    $this->invitation
        ->guest
        ->messages()
        ->exists()
) {
    return;
}

    $this->invitation
        ->guest
        ->messages()
        ->create([
            'message' => $this->memoryMessage,

            'status' => 'pending',

            'star_size' => rand(1, 3),
        ]);

    $this->memorySaved = true;

    $this->memoryMessage = '';
}
 */
public function submitMemory(): void
{
    $this->validate([
        'memoryMessage' => [
            'required',
            'string',
            'min:3',
            'max:500',
        ],
    ]);

    $message =
        $this->invitation
            ->guest
            ->messages()
            ->latest()
            ->first();

    if (
        $message &&
        $message->status === 'pending'
    ) {

        $message->update([
            'message' => $this->memoryMessage,
        ]);

    } else {

        $this->invitation
            ->guest
            ->messages()
            ->create([
                'message' => $this->memoryMessage,

                'status' => 'pending',

                'star_size' => rand(1,3),
            ]);
    }

   $this->hasMemoryMessage = true;

$this->showMemoryModal = false;


if ($this->isPublic) {

    $this->showInvitationReady = true;
}
}
public function goToInvitation(): void
{
    $this->redirect(
        $this->guest->invitation_url,
        navigate: true
    );
}

};
?>

<div class="
        relative
        min-h-screen
        overflow-hidden
        bg-[#020617]
        text-white
    ">

    <x-invitation.star-background />

    <div class="
        relative
        z-10
        px-4
        sm:px-6
        lg:px-8
    ">



        @if ($stage === 'cover')

        <section class="
            flex
            min-h-screen
            items-center
            justify-center
        ">

            <div class="text-center">

                <x-invitation.cover-card :guest-name="$guest?->formal_name"
                    :opening-envelope="$openingEnvelope" :settings="$settings" :opening-animation="$openingAnimation" />

                <div class="mt-0">

                    <button wire:click="openInvitation" wire:loading.attr="disabled" class="
        mt-2
        rounded-full
        border
        border-yellow-500/40
        bg-yellow-500/10
        backdrop-blur-sm
        px-12
        py-5
        text-lg
        font-semibold
        text-yellow-400
        transition-all
        duration-300
        hover:bg-yellow-500
        hover:text-slate-900
        hover:scale-105
        hover:shadow-2xl
        hover:shadow-yellow-500/30
        active:scale-95
    ">
                        <span wire:loading.remove wire:target="openInvitation">
                            ✦ فتح الدعوة
                        </span>

                        <span wire:loading wire:target="openInvitation">
                            ✦
                        </span>
                    </button>
                    @if($openingEnvelope)

                    <div x-data x-init="
            setTimeout(() => {
                $wire.showTransition()
            }, 1000)
        "></div>

                    @endif

                </div>

            </div>

        </section>

        @elseif ($stage === 'transition')

        <section class="
            flex
            min-h-screen
            items-center
            justify-center
        ">

            <x-invitation.transition-scene />

        </section>

        @elseif ($stage === 'invitation')

        <div class="py-5">


            <x-invitation.invitation-content :settings="$settings" :guest="$guest" />

              @if($guest && $guest->has_reception_invitation)

            <div class="
        mt-20
        mx-auto
        max-w-2xl
    ">

                @if($showSuccess)

                <x-invitation.rsvp-success-card :rsvp-status="$rsvpStatus" :attendees-count="$attendeesCount"
                    :rsvp-notes="$rsvpNotes" />

                @else

                <x-invitation.rsvp-form-card :rsvp-status="$rsvpStatus" :attendees-count="$attendeesCount"
                    :rsvp-notes="$rsvpNotes" />

                @endif

            </div>


        </div>
@endif
        <x-invitation.memory-star-card :has-message="$hasMemoryMessage"  :is-public="$isPublic"/>

        @if($showMemoryModal)

        <div class="
        fixed
        inset-0
        z-50
        flex
        items-center
        justify-center
        bg-black/70
        backdrop-blur-sm
        p-4
    ">

            <div class="
            w-full
            max-w-2xl
            rounded-[32px]
            border
            border-yellow-500/20
            bg-[#0f172a]
            p-8
        ">

                <div class="
                mb-6
                text-center
            ">
                    <div class="
                    mb-3
                    text-4xl
                    text-yellow-500
                ">
                        ✦
                    </div>

                    <h3 class="text-3xl">
                        نجمتك
                    </h3>

                    <p class="
                    mt-3
                    text-slate-400
                ">
                        اكتب أمنية أو صلاة أو ذكرى جميلة
                    </p>
                </div>

                <textarea wire:model.live="memoryMessage" rows="6" maxlength="500" class="
                w-full
                rounded-2xl
                border
                border-white/10
                bg-white/5
                p-4
            "></textarea>

                <div class="
                mt-6
                flex
                justify-center
                gap-4
            ">

                    <button wire:click="$set('showMemoryModal', false)" class="
                    rounded-full
                    border
                    border-white/20
                    px-6
                    py-3
                ">
                        إلغاء
                    </button>

                    <button wire:click="submitMemory" class="
                    rounded-full
                    bg-yellow-500
                    px-8
                    py-3
                    text-slate-900
                    font-semibold
                ">
                        ✦ حفظ النجمة
                    </button>

                </div>

            </div>

        </div>

        @endif

        @endif
        @if($showGuestModal)

<div
    class="
        fixed
        inset-0
        z-50
        flex
        items-center
        justify-center
        bg-black/70
        backdrop-blur-md
        p-4
    "
>

    <div
        class="
            w-full
            max-w-xl
            rounded-[32px]
            border
            border-yellow-500/20
            bg-[#0f172a]
            p-8
        "
    >

        <div class="text-center">

            <div
          <div
    class="
        mb-5
        text-5xl
        modal-star
    "
>
    ✦
</div>

            <h3
    class="
        text-3xl
        font-light
        text-white
    "
>
    ✨ قبل أن تضيء نجمتك
</h3>

<p
    class="
        mt-5
        text-slate-400
        leading-8
        max-w-md
        mx-auto
    "
>
    أخبرنا باسمك ورقم هاتفك،
    <br>
    وسنحفظ نجمتك باسمك لتستطيع العودة إليها
    وتعديلها في أي وقت.
</p>

        </div>

        <div class="mt-8 space-y-5">

            <input
                wire:model.live="publicName"
                type="text"
               placeholder="اكتب اسمك"
                class="
                    w-full
                    rounded-2xl
                    border
                    border-white/10
                    bg-white/5
                    p-4
                "
            >

            <input
                wire:model.live="publicPhone"
                type="tel"
               placeholder="رقم هاتفك"
                class="
                    w-full
                    rounded-2xl
                    border
                    border-white/10
                    bg-white/5
                    p-4
                "
            >

        </div>
        <p
    class="
        mt-6
        text-xs
        text-slate-500
        leading-6
    "
>
    لن يتم استخدام رقم هاتفك إلا للتعرف على نجمتك
    عند عودتك مرة أخرى.
</p>

        <div
            class="
                mt-8
                flex
                justify-center
                gap-4
            "
        >

            <button
                wire:click="$set('showGuestModal', false)"
                class="
                    rounded-full
                    border
                    border-white/20
                    px-6
                    py-3
                "
            >
                إلغاء
            </button>

            <button
                wire:click="continueAsPublicGuest"
                class="
                    rounded-full
                    bg-yellow-500
                    px-8
                    py-3
                    text-slate-900
                    font-semibold
                "
            >
                ✨ أضيء نجمتك
            </button>


        </div>


    </div>

</div>

@endif

@if($showInvitationReady)

<div
    class="
        fixed
        inset-0
        z-50
        flex
        items-center
        justify-center
        bg-black/70
        backdrop-blur-md
        p-4
    "
>

    <div
        class="
            w-full
            max-w-2xl
            rounded-[36px]
            border
            border-yellow-500/20
            bg-[#0f172a]
            p-10
            text-center
        "
    >

        <div class="memory-star-icon">
            ✦
        </div>

        <h2
            class="
                mt-4
                text-4xl
                font-light
            "
        >
            نجمتك أصبحت جزءًا من

            <span class="block text-yellow-400 mt-2">
                Sky Of Memories
            </span>
        </h2>

        <p
            class="
                mt-8
                text-lg
                leading-8
                text-slate-300
            "
        >
            تم حفظ رسالتك بنجاح.

            <br>

            ولأن لكل نجمة مكانها...

            <br>

            أنشأنا لك دعوة خاصة يمكنك العودة
            إليها في أي وقت لتعديل نجمتك.
        </p>

        <div
            class="
                mt-10
                rounded-3xl
                border
                border-yellow-500/20
                bg-white/5
                p-5
            "
        >

            <div
                class="
                    text-sm
                    text-slate-400
                    mb-3
                "
            >
                رابط دعوتك
            </div>

            <div
                id="invitationLink"
                class="
                    break-all
                    text-yellow-300
                "
            >
                {{ $guest?->invitation_url }}
            </div>

        </div>

        <div
            class="
                mt-10
                flex
                flex-col
                md:flex-row
                justify-center
                gap-4
            "
        >

            <button
                onclick="copyInvitationLink()"
                class="
                    rounded-full
                    bg-yellow-500
                    px-8
                    py-4
                    text-slate-900
                    font-semibold
                "
            >
                📋 نسخ الرابط
            </button>

            <button
                wire:click="goToInvitation"
                class="
                    rounded-full
                    border
                    border-yellow-500/40
                    px-8
                    py-4
                    text-yellow-400
                "
            >
                ✨ دخول دعوتي
            </button>

        </div>

    </div>

</div>

@endif

    </div>

</div>
<style>
    .modal-star{

    display:inline-block;

    color:#facc15;

    animation:
        heroTwinkle 2.5s ease-in-out infinite,
        modalRotate 8s linear infinite;

}
</style>

