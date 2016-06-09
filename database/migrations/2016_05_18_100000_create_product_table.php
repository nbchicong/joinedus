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
            $table->string('category_id')->references('id')->on('product_category');
            $table->string('brand_id')->references('id')->on('product_brands');
            $table->text('image_codes');
            $table->text('image_paths');
            $table->integer('quantity');
            $table->string('availability')->nullable();
            $table->string('price');
            $table->text('details')->nullable();
            $table->string('tags')->nullable();
            $table->float('rating')->nullable();
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
