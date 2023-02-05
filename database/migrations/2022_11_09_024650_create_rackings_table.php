<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRackingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rackings', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('palette_id')->unsigned()->index()->nullable();
            $table->string('section')->length(1);
            $table->smallInteger('row');
            $table->smallInteger('column');
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
        Schema::dropIfExists('rackings');
    }
}
