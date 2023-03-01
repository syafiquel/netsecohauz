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
            $table->string('no')->nullable();
            $table->bigInteger('palette_id')->unsigned()->index()->nullable();
            $table->bigInteger('brand_owner_id')->unsigned()->index()->nullable();
            $table->string('name')->unique();
            $table->integer('unit_quantity');
            $table->integer('bundle_quantity')->nullable();
            $table->integer('carton_quantity')->nullable();
            $table->integer('palette_quantity')->nullable();
            $table->string('status');
            $table->date('manufactured_at')->nullable();
            $table->date('expired_at')->nullable();
            $table->string('description')->nullable();
            $table->string('remark')->nullable();
            $table->string('image')->nullable();
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
