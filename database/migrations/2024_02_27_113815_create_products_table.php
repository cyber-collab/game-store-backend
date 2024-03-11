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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->boolean('new')->default(false);
            $table->boolean('top_sales')->default(false);
            $table->unsignedInteger('quantity')->default(0);
            $table->text('summary')->nullable();
            $table->string('color')->nullable()->default('black');
            $table->string('product_code')->nullable();
            $table->string('additional_code')->nullable();
            $table->string('article')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
