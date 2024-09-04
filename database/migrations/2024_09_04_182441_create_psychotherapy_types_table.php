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
        Schema::create('psychotherapy_types', function (Blueprint $table) {
            $table->id();
            $table->string('psychotherapy_name');
            $table->string('psychotherapy_description');
            $table->foreignIdFor(App\Models\User::class);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('psychotherapy_types');
    }
};
