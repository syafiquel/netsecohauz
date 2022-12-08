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
            $table->string('name');
            $table->integer('unit_quantity');
            $table->integer('bundle_quantity');
            $table->integer('carton_quantity');
            $table->integer('palette_quantity');
            $table->string('status');
            $table->date('manufactured_at')->nullable();
            $table->date('expired_at')->nullable();
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
