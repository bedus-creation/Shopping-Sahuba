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
            $table->timestamps();
            $table->string("name");
            $table->enum('condition',[0,1,2,3,4,5])->default(5);
            $table->enum('negotiable',[0,1])->default(0);
            $table->dateTime('expiry_date');
            $table->integer('views')->default(0);

            $table->unsignedInteger("category_id");
            $table->unsignedInteger("price_id");
            $table->unsignedInteger("user_id");
            $table->foreign("user_id")
            ->references("id")
            ->on("users");
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
