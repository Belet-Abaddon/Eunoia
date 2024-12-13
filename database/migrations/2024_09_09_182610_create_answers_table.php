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
        Schema::create('answers', function (Blueprint $table) {
            $table->id();
            $table->integer('answer1');
            $table->integer('answer2');
            $table->integer('answer3');
            $table->integer('answer4');
            $table->integer('answer5');
            $table->integer('answer6');
            $table->integer('answer7');
            $table->integer('answer8');
            $table->integer('answer9');
            $table->integer('answer10');
            $table->integer('percentage');
            $table->foreignIdFor(App\Models\PhychotherapyType::class);
            $table->foreignIdFor(App\Models\User::class);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('answers');
    }
};
