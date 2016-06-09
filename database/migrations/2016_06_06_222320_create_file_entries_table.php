<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFileEntriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('file_store', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id')->unique();
            $table->string('code');
            $table->string('filename');
            $table->string('mimetype');
            $table->string('original_filename');
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
        Schema::drop('file_store');
    }
}
