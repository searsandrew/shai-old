<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoneeFamilyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donee_family', function (Blueprint $table) {
            $table->bigInteger('donee_id')->unsigned();
            $table->foreign('donee_id')->references('id')->on('donees');
            $table->bigInteger('family_id')->unsigned();
            $table->foreign('family_id')->references('id')->on('families');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donee_family');
    }
}
