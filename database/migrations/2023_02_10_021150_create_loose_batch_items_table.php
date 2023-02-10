<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLooseBatchItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('loose_batch_items', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('carton_id')->unsigned()->index()->nullable();
            $table->bigInteger('bundle_id')->unsigned()->index()->nullable();
            $table->integer('quantity')->nullable();
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
        Schema::dropIfExists('loose_batch_items');
    }
}
