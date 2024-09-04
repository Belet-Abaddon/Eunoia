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
        Schema::create('post', function (Blueprint $table) {
            $table->id();
            $table->timestamp('currentTime');
            $table->string('caption');
            $table->string('image')->nullable();
            $table->string('video')->nullable();
            $table->unsignedBigInteger('v_id');
            //Add foreign key
            $table->foreign('v_id')->references('id')->on('volunteer')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('post');
    }
};
