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
            $table->string('siteName');
            $table->string('siteCode');
            $table->string('siteLogo');
            $table->string('siteDescription')->nullable();
            $table->string('siteTitle');
            $table->string('author');
            $table->string('copyright');
            $table->string('phone');
            $table->string('email');
            $table->string('address');
            $table->string('language');
            $table->string('currency');
            $table->string('social_fb')->nullable();
            $table->string('social_zl')->nullable();
            $table->string('social_in')->nullable();
            $table->string('social_gg')->nullable();
            $table->string('social_db')->nullable();
            $table->string('status')->nullable();
            $table->string('pendingPage')->nullable();
            $table->string('keywords')->nullable();
            $table->string('tags')->nullable();
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
