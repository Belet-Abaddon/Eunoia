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
        Schema::create('comment', function (Blueprint $table) {
            $table->id();
            $table->timestamp('commentTime');
            $table->string('comment');
            $table->unsignedBigInteger('u_id');
            $table->unsignedBigInteger('v_id');
            //Add foreign key
            $table->foreign('u_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('v_id')->references('id')->on('volunteer')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment');
    }
};
