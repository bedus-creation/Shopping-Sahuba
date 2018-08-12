<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->increments('id');
            $table->string("base_url");
            $table->text("in_json");
            $table->enum('type',['image','video']);
            $table->timestamps();
        });

        Schema::create('media_product', function (Blueprint $table) {
            $table->unsignedInteger('media_id');
            $table->unsignedInteger('product_id');
            $table->unique(['media_id','product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media');
        Schema::dropIfExists('media_product');
    }
}
