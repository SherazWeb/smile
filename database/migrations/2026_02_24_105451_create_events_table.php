<?php
// database/migrations/2024_01_01_000001_create_events_table.php

use App\Models\EventCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(EventCategory::class, 'category_id')->constrained();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('description');
            $table->string('location');
            $table->date('event_date');
            $table->date('event_end_date')->nullable(); // For multi-day events
            $table->string('image_path')->nullable();
            $table->json('gallery_folder')->nullable(); // For multiple images
            $table->integer('participant_count')->nullable();
            $table->string('participant_unit')->default('participants'); // e.g., "participants", "students", "companies"
            $table->json('tags')->nullable(); // For service tags like "Autism", "Parenting"
            
            // Event type badge
            $table->string('badge_text'); // e.g., "Workshop", "Free Camp"
            
            $table->timestamps();
            $table->softDeletes(); // For archiving events
        });
    }

    public function down()
    {
        Schema::dropIfExists('events');
    }
};