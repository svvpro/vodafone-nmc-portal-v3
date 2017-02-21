<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEngineersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('engineers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 100);
            $table->string('middle_name',100);
            $table->string('surname',100);
            $table->integer('pbx');
            $table->string('mobile_phone', 50);
            $table->string('email', 150);
            $table->integer('departament_id');
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
        Schema::dropIfExists('engineers');
    }
}
