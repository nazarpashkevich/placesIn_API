<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('code');
            $table->string('avatar_url');
            $table->string('premium_tarif');
            $table->string('geo_coords');
            $table->string('icon_geo');
            $table->string('description');
            $table->integer('cat_id');
            $table->integer('owner_id');
            $table->string('ins_link');
            $table->string('fb_link');
            $table->string('yt_link');
            $table->string('custom_service_1');
            $table->string('custom_price_1');
            $table->string('custom_service_2');
            $table->string('custom_price_2');
            $table->string('custom_service_3');
            $table->string('custom_price_3');
            $table->string('custom_service_4');
            $table->string('custom_price_4');
            $table->string('custom_service_5');
            $table->string('custom_price_5');
            $table->string('services_id');
            $table->string('address');
            $table->string('schedule');
            $table->string('phone');
            $table->string('detail_picture');
            $table->string('background_picture');
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
        Schema::dropIfExists('products');
    }
}
