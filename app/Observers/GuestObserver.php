<?php

namespace App\Observers;

use App\Models\Guest;
use App\Models\InvitationLink;
use Illuminate\Support\Str;

class GuestObserver
{
    public function creating(Guest $guest): void
    {
        if (
            blank($guest->invited_by)
            && auth()->check()
        ) {
            $guest->invited_by = auth()->id();
        }

        if (blank($guest->greeting_name)) {
            $guest->greeting_name = $this->generateGreetingName($guest);
        }

        if (blank($guest->sky_name)) {
            $guest->sky_name = $this->generateSkyName($guest);
        }
    }

    public function created(Guest $guest): void
    {
        do {

            $token = Str::upper(
                Str::random(10)
            );
        } while (

            InvitationLink::query()
            ->where('token', $token)
            ->exists()

        );

        InvitationLink::create([
            'guest_id' => $guest->id,
            'token'    => $token,
        ]);
    }

    private function generateGreetingName(
        Guest $guest
    ): string {

        $parts = preg_split(
            '/\s+/',
            trim($guest->full_name)
        );

        $firstName =
            $parts[0] ?? $guest->full_name;

        if ($guest->guest_title) {

            return
                $guest->guest_title->value
                . ' '
                . $firstName;
        }

        return $firstName;
    }

    private function generateSkyName(
        Guest $guest
    ): string {

        return trim(
            preg_replace(
                '/\s+/',
                ' ',
                $guest->full_name
            )
        );
    }
}
