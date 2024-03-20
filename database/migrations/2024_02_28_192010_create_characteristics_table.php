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
            $table->string('producer')->nullable();
            $table->string('display_size')->default('Інше');
            $table->string('resolving_power')->nullable();
            $table->string('screen')->nullable();
            $table->string('matrix_type')->default('IPS');
            $table->string('screen_refresh_rate')->nullable();
            $table->string('processor')->nullable();
            $table->integer('number_of_processor_cores')->nullable();
            $table->string('RAM_type')->nullable();
            $table->string('RAM_capacity')->nullable();
            $table->string('types_of_hard_drives')->nullable();
            $table->string('SSD_size')->nullable();
            $table->string('video_card_type')->nullable();
            $table->string('video_card')->nullable();
            $table->string('amount_of_VRAM')->nullable();
            $table->string('OS')->nullable();
            $table->string('battery_capacity')->nullable();
            $table->string('weight')->nullable();
            $table->string('country_of_production')->nullable();
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
