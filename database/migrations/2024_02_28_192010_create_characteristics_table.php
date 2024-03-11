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
        Schema::create('characteristics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_id');
            $table->string('producer');
            $table->string('display_size')->default('Інше');
            $table->string('resolving_power');
            $table->string('screen');
            $table->string('matrix_type');
            $table->string('screen_refresh_rate');
            $table->string('processor');
            $table->integer('number_of_processor_cores');
            $table->string('RAM_type');
            $table->string('RAM_capacity');
            $table->string('types_of_hard_drives');
            $table->string('SSD_size');
            $table->string('video_card_type');
            $table->string('video_card')->nullable();
            $table->integer('amount_of_VRAM')->nullable();
            $table->string('OS');
            $table->string('battery_capacity');
            $table->string('weight');
            $table->string('country_of_production');
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('characteristics');
    }
};
