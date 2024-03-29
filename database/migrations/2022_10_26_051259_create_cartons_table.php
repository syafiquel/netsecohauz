<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCartonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cartons', function (Blueprint $table) {
            $table->id();
            $table->uuid('uuid');
            $table->bigInteger('batch_id')->unsigned()->index()->nullable();
            $table->string('name');
            $table->integer('unit_quantity');
            $table->integer('product_quantity')->nullable();
            $table->string('description');
            $table->string('remark');
            $table->date('production_in_at')->nullable();
            $table->date('production_out_at')->nullable();
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
        Schema::dropIfExists('cartons');
    }
}
