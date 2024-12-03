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
        Schema::create('contactss', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('name');
            $table->integer('number_phone');
            $table->longText('content');
            $table->char('email');
            $table->char('subject');
            $table->timestamp('failed_at')->useCurrent();
        });

        // Schema::create('sabad', function (Blueprint $table) {
        //     $table->id()->primary();
        //     $table->unsignedBigInteger('user_id');
        //     $table->foreign('user_id')->references('id')->on('user')->onDelete('cascade');
        //     $table->longText('content');
        //     $table->char('email');
        //     $table->char('subject');
        //     $table->timestamp('failed_at')->useCurrent();
        // });

        Schema::create('products', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('name');
            $table->string('Brand');
            // $table->string('image');
            // $table->unsignedBigInteger('sabad_id');
            // $table->foreign('sabad_id')->references('id')->on('sabad')->onDelete('cascade');
            $table->integer('price');
            $table->integer('count')->default(0);
            $table->bigInteger('count_view')->default(0);
            $table->longText('discription');
            $table->longText('Criticism');
            $table->float('stars');
            $table->float('with');
            $table->float('length');
            $table->float('discust');
            $table->string('garant');
            $table->boolean('Chosen')->default(0);
            $table->boolean('Special_sale')->default(0);
            $table->timestamp('failed_at')->useCurrent();
        });

        // Schema::create('USERES', function (Blueprint $table) {
        //     $table->id()->primary();
        //     $table->string('full_name');
        //     $table->integer('number');
        //     $table->char('email');
        //     $table->integer('cart_number');
        //     $table->dateTime('birthday');
        //     $table->char('password');
        //     $table->char('image');
        //     $table->integer('home_number');
        //     $table->timestamp('failed_at')->useCurrent();
        // });

        Schema::create('adresses', function (Blueprint $table) {
            $table->id()->primary();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('ostan');
            $table->string('city');
            $table->char('tahvil');
            $table->char('adress');
            $table->boolean('is_selected')->default(false);
            $table->integer('number');
            $table->integer('post_number');
            $table->timestamp('failed_at')->useCurrent();
        });

        Schema::create('comments', function (Blueprint $table) {
            $table->id()->primary();
            $table->boolean('status')->default(0);
            $table->longText('content');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('parent_id')->default(0);
            $table->unsignedBigInteger('commenttable_id');
            $table->string('commenttable_type');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamp('failed_at')->useCurrent();
        });


        Schema::create('blogs', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('title');
            $table->bigInteger('count_view')->default(0);
            $table->longText('content');
            $table->char('image');
            $table->timestamp('failed_at')->useCurrent();
        });



    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contact');
        // Schema::dropIfExists('USER');
        Schema::dropIfExists('blog');

        Schema::dropIfExists('comment');
        Schema::dropIfExists('product');
        Schema::dropIfExists('adresses');
    }
};
