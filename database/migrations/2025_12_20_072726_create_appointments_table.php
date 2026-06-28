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
        Schema::create('appointments', function (Blueprint $table) {
            $table->id();

            // Patient Information
            $table->string('patient_name');
            $table->string('patient_email');
            $table->string('patient_phone');
            $table->unsignedTinyInteger('age')->nullable();
            $table->enum('gender', ['male', 'female', 'other', 'prefer_not_to_say'])->nullable();

            // Appointment Type
            $table->enum('appointment_type', ['online', 'physical'])->default('physical');

            // Appointment Core Details
            $table->foreignId('service_id')
                ->constrained('services')
                ->onDelete('cascade');

            $table->date('appointment_date');
            $table->time('appointment_time');

            $table->text('notes')->nullable();

            // Status Workflow
            $table->enum('status', [
                'pending',
                'confirmed',
                'completed',
                'cancelled'
            ])->default('pending');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('appointments');
    }
};
