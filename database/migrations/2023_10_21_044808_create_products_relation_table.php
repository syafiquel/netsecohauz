<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsRelationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreign('category_id')->references('id')->on('product_categories')->onDelete('cascade');
            $table->foreign('industry_id')->references('id')->on('industries')->onDelete('cascade');
            $table->foreign('brand_owner_id')->references('id')->on('brand_owners')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('products');
    }
}
