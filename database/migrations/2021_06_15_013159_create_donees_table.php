<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDoneesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('donees', function (Blueprint $table) {
            $table->id();
            $table->string('slug')->unique();
            $table->string('firstname');
            $table->bigInteger('family_id')->unsigned();
            $table->string('lastname');
            $table->foreign('family_id')->references('id')->on('families');
            $table->text('description');
            $table->integer('age')->unsigned();
            $table->enum('gender', ['male', 'female', 'transgender', 'undeclared']);
            $table->boolean('privacy')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('donees');
    }
}
