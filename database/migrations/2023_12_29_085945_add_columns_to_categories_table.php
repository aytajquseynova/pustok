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
        Schema::table('categories', function (Blueprint $table) {
            $table->string('tags')->nullable(); 
            $table->string('product_title'); 
            $table->string('ex_tax'); 
            $table->string('brands'); 
            $table->string('product_code'); 
            $table->string('reward_points'); 
            $table->boolean('availability');
            $table->decimal('price', 10, 2); 
            $table->decimal('old_price', 10, 2)->nullable(); 
            $table->text('description')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropColumn([
                'tags',
                'product_title',
                'ex_tax',
                'brands',
                'product_code',
                'reward_points',
                'availability',
                'price',
                'old_price',
                'description',
            ]);
        });
    }
};
