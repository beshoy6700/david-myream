<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invitation_links', function (Blueprint $table) {
            $table->id();

            $table->foreignId('guest_id')
                ->unique()
                ->constrained()
                ->cascadeOnDelete();

            $table->string('token', 64)->unique();

            $table->timestamp('opened_at')->nullable();

            $table->timestamp('last_visited_at')->nullable();

            $table->unsignedInteger('visits_count')->default(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invitation_links');
    }
};