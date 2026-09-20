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
            $table->bigInteger('product_category_id')->unsigned()->nullable();
            $table->string('name')->nullable();
            $table->text('photo')->nullable();
            $table->string('slug')->nullable();
            $table->text('short_description')->nullable();
            $table->text('description')->nullable();
            $table->text('seo_title')->nullable();
            $table->text('seo_description')->nullable();
              $table->integer('show_on_home')->nullable();
              
            //$table->string('price',10,2)->default(0);

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
