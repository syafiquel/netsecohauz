<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePalettesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('palettes', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->bigInteger('batch_id')->unsigned()->index()->nullable();
            $table->string('name');
            $table->integer('quantity');
            $table->string('description');
            $table->string('remark');
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
        Schema::dropIfExists('palettes');
    }
}
