<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBrandsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('product_brands', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unique();
            $table->string('name');
            $table->string('code');
            $table->text('intro')->nullable();
            $table->bigInteger('countView')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('product_brands');
    }
}
