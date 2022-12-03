<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->bigInteger('palette_id')->unsigned()->index()->nullable();
            $table->bigInteger('brand_owner_id')->unsigned()->index()->nullable();
            $table->string('group_name');
            $table->string('name');
            $table->integer('unit_quantity');
            $table->string('status');
            $table->date('manufactured_at');
            $table->date('expired_at');
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
        Schema::dropIfExists('batches');
    }
}
