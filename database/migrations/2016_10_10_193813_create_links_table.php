<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->engine='MyISAM';
            $table->increments('link_id');
            $table->string('link_name')->default('')->comment('//link name');
            $table->string('link_title')->default('')->comment('//link title');
            $table->string('link_url')->default('')->comment('//link address');
            $table->integer('link_order')->default(0)->comment('//link order');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('links');
    }
}
