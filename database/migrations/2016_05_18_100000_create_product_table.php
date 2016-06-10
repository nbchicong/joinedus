<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unique();
            $table->string('name');
            $table->string('code');
            $table->string('categoryId')->references('id')->on('product_category');
            $table->string('brandId')->references('id')->on('product_brands');
            $table->text('imageCodes');
            $table->text('imagePaths');
            $table->string('price');
            $table->integer('quantity');
            $table->boolean('availability')->nullable();
            $table->boolean('promotions')->nullable();
            $table->string('discount')->nullable();
            $table->string('tags')->nullable();
            $table->float('rating')->nullable();
            $table->text('details')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('products');
    }
}
