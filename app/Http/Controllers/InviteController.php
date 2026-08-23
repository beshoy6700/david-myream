<?php

namespace App\Http\Controllers;

use App\Models\InvitationLink;

class InviteController extends Controller
{
    public function __invoke(?string $token = null)
    {
        if ($token) {
            InvitationLink::query()
                ->with('guest')
                ->where('token', $token)
                ->firstOrFail();
        }

        return view('invite.show', [
            'token' => $token,
        ]);
    }
}
