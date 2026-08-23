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
        Schema::create('guests', function (Blueprint $table) {
            $table->id();
            $table->string('guest_title')->nullable();

            $table->string('full_name');

            $table->string('greeting_name')->nullable();

            $table->string('sky_name')->nullable();

            $table->string('phone', 20)->nullable()->index();

            $table->string('gender', 20)->nullable();

            $table->string('guest_group', 50)->default('public');

            $table->string('guest_source', 50)->default('public');

            $table->boolean('has_reception_invitation')->default(false);

            $table->boolean('is_public')->default(false);

            $table->foreignId('invited_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->text('notes')->nullable();

            $table->timestamps();

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guests');
    }
};