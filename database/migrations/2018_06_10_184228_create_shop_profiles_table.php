<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateShopProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shop_profiles', function (Blueprint $table) {
            $table->increments('id');
            $table->timestamps();
            $table->text('info')->nullable();
            $table->string('address')->nullable();


            $table->unsignedInteger("user_id");

            
            $table->foreign("user_id")
            ->references("id")
            ->on("users")
            ->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shop_profiles');
    }
}
