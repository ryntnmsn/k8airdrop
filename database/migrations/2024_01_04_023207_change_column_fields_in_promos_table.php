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
        Schema::table('promos', function (Blueprint $table) {
            $table->boolean('is_visible')
                ->default(false)
                ->nullable()->change();
            $table->string('type')
                ->nullable()
                ->change();
            $table->boolean('is_banner')
                ->default(false)
                ->nullable()
                ->change();
            $table->boolean('is_featured')
                ->default(false)
                ->nullable()
                ->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('promos', function (Blueprint $table) {
            //
        });
    }
};
