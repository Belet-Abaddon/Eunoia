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
        Schema::create('chat_session', function (Blueprint $table) {
            $table->id();
            $table->string('message');
            $table->unsignedBigInteger('u_id'); // Ensure this matches the primary key type in 'users'
            $table->unsignedBigInteger('a_id'); // Ensure this matches the primary key type in 'appointment'
            $table->unsignedBigInteger('t_id'); // Ensure this matches the primary key type in 'therapists'
            $table->unsignedBigInteger('v_id'); // Ensure this matches the primary key type in 'volunteer'
            $table->timestamp('current_time');

            // Add foreign key constraints
            $table->foreign('u_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('t_id')->references('id')->on('therapist')->onDelete('cascade');
            $table->foreign('v_id')->references('id')->on('volunteer')->onDelete('cascade');
            $table->foreign('a_id')->references('id')->on('appointment')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chat_session');
    }
};
