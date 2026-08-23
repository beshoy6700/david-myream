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
        Schema::create('wedding_settings', function (Blueprint $table) {

            $table->id();

            $table->string('groom_name');

            $table->string('bride_name');

            $table->dateTime('wedding_date');

            $table->string('church_name_ar');
            $table->string('church_name_en')->nullable();

            $table->text('church_address_ar')->nullable();
            $table->text('church_address_en')->nullable();

            $table->string('church_maps_url')->nullable();

            $table->string('reception_name_ar')->nullable();
            $table->string('reception_name_en')->nullable();

            $table->text('reception_address_ar')->nullable();
            $table->text('reception_address_en')->nullable();

            $table->string('reception_maps_url')->nullable();

            $table->unsignedTinyInteger('max_attendees_limit')
                ->default(20);

            $table->string('locale')
                ->default('ar');

            $table->string('cover_image')->nullable();

            $table->boolean('enable_memory_sky')
                ->default(true);

            $table->boolean('enable_ai_replies')
                ->default(true);

            $table->longText('welcome_message_ar')
                ->nullable();

            $table->longText('welcome_message_en')
                ->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wedding_settings');
    }
};