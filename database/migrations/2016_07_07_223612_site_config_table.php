<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SiteConfigTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('site_config', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->string('id');
            $table->string('siteName')->nullable();
            $table->string('siteCode')->nullable();
            $table->string('siteLogo')->nullable();
            $table->string('siteDescription')->nullable();
            $table->string('siteTitle')->nullable();
            $table->string('keywords')->nullable();
            $table->string('tags')->nullable();
            $table->string('author')->nullable();
            $table->string('copyright')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('address')->nullable();
            $table->string('language')->nullable();
            $table->string('currency')->nullable();
            $table->integer('status')->nullable();
            $table->string('pendingPage')->nullable();
            $table->string('social_fb')->nullable();
            $table->string('social_zl')->nullable();
            $table->string('social_gg')->nullable();
            $table->string('social_in')->nullable();
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
        Schema::drop('site_config');
    }
}
