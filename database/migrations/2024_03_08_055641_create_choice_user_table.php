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
        Schema::create('choice_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('choice_id')
                ->constrained('choices')
                ->cascadeOnDelete()
                ->nullable();
            $table->foreignId('user_id')
                ->constrained('users')
                ->cascadeOnDelete()
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('choice_user');
    }
};
