<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cates',function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('name');
            $table->tinyInteger('zoom');
            $table->string('alias');
            $table->string('latitude');
            $table->string('longitude'); 
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
        //
    }
}
