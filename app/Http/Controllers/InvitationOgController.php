<?php

namespace App\Http\Controllers;

use App\Models\InvitationLink;
use App\Models\WeddingSetting;
use App\Services\OpenGraph\OpenGraphService;

class InvitationOgController extends Controller
{
    public function __invoke(string $token)
    {
        $invitation = InvitationLink::query()
            ->with('guest')
            ->where('token', $token)
            ->firstOrFail();

        return view('og.invitation', [
            'guest' => $invitation->guest,
            'settings' => \App\Models\WeddingSetting::first(),
        ]);
    }

    public function view(string $token)
    {
        $invitation = InvitationLink::with('guest')
            ->whereToken($token)
            ->firstOrFail();

        return view('og.invitation', [
            'guest' => $invitation->guest,
            'settings' => WeddingSetting::first(),
        ]);
    }

    public function image(
        string $token,
        OpenGraphService $service
    ) {
        $invitation = InvitationLink::with('guest')
            ->whereToken($token)
            ->firstOrFail();

        return response()->file(
            $service->generate($invitation)
        );
    }
}
