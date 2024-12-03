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
        Schema::create('discounts', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->integer('percent');
            $table->timestamp('expired_at')->nullable();
            $table->timestamps();
        });
        Schema::create('discount_product', function (Blueprint $table) {
            $table->unsignedBigInteger('discount_id');
            $table->foreign('discount_id')->references('id')->on('discounts')->onDelete('cascade');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            $table->primary(['discount_id','product_id']);
        });
        Schema::create('discount_user', function (Blueprint $table) {
            $table->unsignedBigInteger('discount_id');
            $table->foreign('discount_id')->references('id')->on('discounts')->onDelete('cascade');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

            $table->primary(['discount_id','user_id']);
        });
        Schema::create('discount_productcategory', function (Blueprint $table) {
            $table->unsignedBigInteger('productcategory_id');
            $table->foreign('productcategory_id')->references('id')->on('productcategory')->onDelete('cascade');
            $table->unsignedBigInteger('discount_id');
            $table->foreign('discount_id')->references('id')->on('discounts')->onDelete('cascade');

            $table->primary(['discount_id','productcategory_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('discount_product');
        Schema::dropIfExists('discount_user');
        Schema::dropIfExists('discount_productcategory');
        Schema::dropIfExists('discounts');
    }
};
