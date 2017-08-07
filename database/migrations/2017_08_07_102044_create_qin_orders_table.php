<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQinOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('qin_orders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('idcard');
            $table->integer('money');
            $table->integer('qixian');
            $table->integer('zhouhuankuan');
            $table->integer('lixi');
            $table->integer('fuwufei');
            $table->string('beizhu');

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
        Schema::drop('qin_orders');
    }
}
