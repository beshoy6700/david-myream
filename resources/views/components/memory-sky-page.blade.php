<?php

use Livewire\Component;
use Illuminate\Support\Collection;
use App\Models\GuestMessage;

new class extends Component
{
    public Collection $stars;

    public int $currentMessage = 0;

    public ?GuestMessage $activeMessage = null;

    public bool $showEnding = false;

    public array $openedStars = [];

    public function mount()
    {
        $this->stars =
            GuestMessage::query()
                ->where('status', 'approved')
                ->with('guest')
                ->get();

        $this->dispatch('presentation-started');
    }

    public function nextMessage(): void
    {
        if ($this->stars->isEmpty()) {
            return;
        }

        if ($this->currentMessage >= $this->stars->count()) {

    $this->dispatch('sky-finished');

    $this->showEnding = true;

    return;
}

        $this->activeMessage =
            $this->stars[$this->currentMessage];

        $this->openedStars[] =
            $this->activeMessage->id;

        $this->dispatch(
            'star-selected',
            id: $this->activeMessage->id
        );

        $this->currentMessage++;
    }

    public function hideMessage(): void
{
    $this->activeMessage = null;

    $this->dispatch(
        'message-hidden'
    );
}
};

?>

<div class="relative min-h-screen overflow-hidden bg-[#020617] text-white">

    <x-invitation.star-background />

    <x-invitation.sky.memory-center
        :stars="$stars"
    />

    <x-invitation.sky.memory-orbits
        :stars="$stars"
        :active-message="$activeMessage"
        :opened-stars="$openedStars"
    />

    <x-invitation.sky.memory-overlay
        :active-message="$activeMessage"
    />

    <x-invitation.sky.memory-ending
        :show-ending="$showEnding"
        :stars="$stars"
    />

    <x-invitation.sky.memory-assets />

</div>
