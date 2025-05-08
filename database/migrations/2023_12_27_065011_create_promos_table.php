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
        Schema::create('promos', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->foreignId('language_id')
                ->constrained('languages')
                ->cascadeOnDelete();
            $table->longText('description')
                ->nullable();
            $table->longText('terms')
                ->nullable();
            $table->longText('article')
                ->nullable();
            $table->string('prize_pool')
                ->nullable();
            $table->boolean('is_visible')
                ->default(false);
            $table->date('start_date')
                ->nullable();
            $table->date('end_date')
                ->nullable();
            $table->string('image')
                ->nullable();
            $table->string('type');
            $table->string('game_type')
                ->nullable();
            $table->boolean('is_banner')
                ->default(false);
            $table->boolean('is_featured')
                ->default(false);
            $table->string('button_name')
                ->nullable();
            $table->string('button_link')
                ->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('promos');
    }
};
