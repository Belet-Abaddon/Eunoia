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
        Schema::create('question_record', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('q_id');
            $table->unsignedBigInteger('r_id');
            //Add foreign key constraint
            $table->foreign('q_id')->references('id')->on('question')->onDelete('cascade');
            $table->foreign('r_id')->references('id')->on('record')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('question_record');
    }
};
