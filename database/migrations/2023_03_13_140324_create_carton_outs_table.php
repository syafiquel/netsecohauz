<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartonOutsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carton_outs', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->bigInteger('batch_id')->unsigned()->index()->nullable();
            $table->string('name');
            $table->integer('product_quantity')->nullable();
            $table->string('description')->nullable();
            $table->string('remark')->nullable();
            $table->timestamp('production_in_at')->nullable();
            $table->timestamp('production_out_at')->nullable();
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
        Schema::dropIfExists('carton_outs');
    }
}
