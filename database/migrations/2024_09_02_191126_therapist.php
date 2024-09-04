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
        Schema::create('therapist', function (Blueprint $table) {
            $table->id();
            $table->string('t_name');
            $table->string('email');
            $table->string('password');
            $table->string('address');
            $table->string('gender');
            $table->string('specialist');
            $table->string('degree');
            $table->string('university');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('therapist');
    }
};
