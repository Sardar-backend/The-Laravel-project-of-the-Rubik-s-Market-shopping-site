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




        Schema::create('blogCategorys', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('name');
            $table->unsignedBigInteger('parent');
            $table->timestamps();
        });


        Schema::create('productcategory', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('name');
            $table->unsignedBigInteger('parent')->default(0);
            $table->timestamps();
        });


        Schema::create('blogCategorys_blog', function (Blueprint $table) {

            $table->unsignedBigInteger('blogCategory_id');
            $table->foreign('blogCategory_id')->references('id')->on('blogCategorys')->onDelete('cascade');
            $table->unsignedBigInteger('blog_id');
            $table->foreign('blog_id')->references('id')->on('blogs')->onDelete('cascade');
            $table->primary(['blogCategory_id','blog_id']);



        });


        Schema::create('product_productcategory', function (Blueprint $table) {


            $table->unsignedBigInteger('productcategory_id');
            $table->foreign('productcategory_id')->references('id')->on('productcategory')->onDelete('cascade');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->primary(['productcategory_id','product_id']);


        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::dropIfExists('categoys');
        // Schema::dropIfExists('blogCategory');
    }
};
