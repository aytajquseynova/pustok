<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('products')) {
            Schema::create('products', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id')->default(1); 
                $table->unsignedBigInteger('category_id');
                $table->unsignedBigInteger('brand_id');
                $table->string('author')->nullable();
                $table->string('title')->nullable();
                $table->string('price')->nullable();
                $table->string('percent')->nullable();
                $table->string('main_image')->nullable();
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
