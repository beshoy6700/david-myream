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
        Schema::create('guest_messages', function (Blueprint $table) {
            $table->id();

            $table->foreignId('guest_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->text('message');

            $table->text('ai_reply')->nullable();

            $table->string('status')->default('pending');

            $table->unsignedInteger('star_number')->nullable();

            $table->unsignedTinyInteger('star_size')->default(1);

            $table->boolean('is_featured')->default(false);

            $table->foreignId('approved_by')
                ->nullable()
                ->constrained('users')
                ->nullOnDelete();

            $table->timestamp('approved_at')->nullable();

            $table->timestamp('reviewed_at')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('guest_messages');
    }
};