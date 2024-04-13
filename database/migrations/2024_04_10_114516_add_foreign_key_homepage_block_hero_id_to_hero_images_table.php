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
        Schema::table('hero_images', function (Blueprint $table) {
            $table->unsignedBigInteger('home_block_hero_id')->nullable()->after('image');
            $table->foreign('home_block_hero_id')
                ->references('id')
                ->on('homepage_blocks_hero')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('hero_images', function (Blueprint $table) {
            $table->dropForeign(['home_block_hero_id']);
            $table->dropColumn('home_block_hero_id');
        });
    }
};
