<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class InvitationLink extends Model
{
    protected $fillable = [
        'guest_id',
        'token',
        'opened_at',
        'last_visited_at',
        'visits_count',
    ];

    protected $casts = [
        'opened_at' => 'datetime',
        'last_visited_at' => 'datetime',
    ];

    public function guest(): BelongsTo
    {
        return $this->belongsTo(Guest::class);
    }

    public function markAsVisited(): void
    {
        $this->update([
            'last_visited_at' => now(),
            'opened_at' => $this->opened_at ?? now(),
            'visits_count' => $this->visits_count + 1,
        ]);
    }
}
