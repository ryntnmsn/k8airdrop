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
        Schema::create('participants', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->nullable();
            $table->bigInteger('promo_id')->nullable();
            $table->string('name')->nullable();
            $table->string('k8_username')->nullable();
            $table->string('email')->nullable();
            $table->string('retweet_url')->nullable();
            $table->string('image')->nullable();
            $table->string('sns_id')->nullable();
            $table->longText('comment')->nullable();
            $table->boolean('is_winner')->default(false);
            $table->string('ip')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participants');
    }
};
