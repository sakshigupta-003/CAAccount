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
        // database/migrations/2025_xx_xx_create_membership_applications_table.php
        Schema::create('membership_applications', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->index();
            $table->string('phone')->nullable();
            $table->date('dob')->nullable();
            $table->string('gender')->nullable();           // male / female / other / prefer_not_to_say
            $table->string('member_type')->nullable();      // new / returning
            $table->json('interests')->nullable();          // ["Networking", "Volunteering", ...]
            $table->string('interested_programs')->nullable();
            $table->text('accommodations_needed')->nullable();

            // Address
            $table->string('street')->nullable();
            $table->string('city')->nullable();
            $table->string('state_province')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('country')->nullable();

            $table->text('message')->nullable();

            $table->string('status')->default('pending');   // pending / reviewed / approved / rejected
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('membership_applications');
    }
};
