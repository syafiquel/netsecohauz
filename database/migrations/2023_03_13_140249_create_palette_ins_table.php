<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaletteInsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('palette_ins', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->bigInteger('batch_id')->unsigned()->index()->nullable();
            $table->string('name');
            $table->integer('unit_quantity');
            $table->string('description')->nullable();
            $table->string('remark')->nullable();
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
        Schema::dropIfExists('palette_ins');
    }
}
