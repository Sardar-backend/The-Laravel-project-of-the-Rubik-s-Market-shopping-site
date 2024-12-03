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
        Schema::create('attribute', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });



        Schema::create('attribute_value', function (Blueprint $table) {
            $table->id();
            $table->string('value');
            $table->unsignedBigInteger('attribute_id');
            $table->foreign('attribute_id')->references('id')->on('attribute')->onDelete('cascade');
            $table->timestamps();
        });



        Schema::create('attribute_product', function (Blueprint $table) {


            $table->unsignedBigInteger('attributes_id');
            $table->foreign('attributes_id')->references('id')->on('attribute')->onDelete('cascade');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->unsignedBigInteger('value_id');
            $table->foreign('value_id')->references('id')->on('attribute_value')->onDelete('cascade');
            $table->primary(['attributes_id','product_id','value_id']);


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attributes');
    }
};
