<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->enum('role', ['admin', 'user', 'pandit'])->default('user');
            $table->string('name');
            $table->string('full_name')->nullable(); // Backup for full name if needed
            $table->date('date_of_birth')->nullable();
            $table->integer('experience')->nullable(); // Years
            $table->enum('gender', ['Male', 'Female', 'Other'])->nullable();
            $table->enum('preferred_communication_mode', ['call', 'whatsapp', 'email'])->nullable();
            $table->string('phone', 10)->unique()->nullable(); // Indian mobile
            $table->string('associated_mandir')->nullable();
            $table->string('city')->nullable();
            $table->string('pincode', 6);
            $table->string('state')->nullable();
            $table->text('street_address')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('profile_picture')->nullable(); // Path
            $table->string('aadhar_photo')->nullable(); // Encrypted path
            $table->string('pan_photo')->nullable(); // Encrypted path
            // Extra Pandit-specific fields
            $table->json('languages_known')->nullable(); // e.g., ["Hindi", "Sanskrit"]
            $table->json('services_offered')->nullable(); // e.g., ["bristol", "Havan"]
            $table->text('certifications')->nullable(); // e.g., "Acharya from XYZ"
            $table->rememberToken();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};