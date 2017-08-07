<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQinHuankuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qin_huankuans', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('qin_order_id');
            $table->string('beizhu',20);
            $table->integer('money');

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
        Schema::drop('qin_huankuans');
    }
}
