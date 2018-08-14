<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AlterTableShopProfileAddFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shop_profiles',function(Blueprint $table){
            $table->dateTime('established_at')->nullable();
            $table->string('sologon')->nullable();
            $table->string('opening_hours')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shop_profiles',function(Blueprint $table){
            $table->dropColumn(['established_at','sologon','opening_hours']);
        });
    }
}
