<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ChangeShopsProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('shopsproducts', function (Blueprint $table) {
            //
			$table->integer('shop_id')->unsigned();
			$table->foreign('shop_id')->references('id')->on('shops');
			$table->integer('product_id')->unsigned();
			$table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('shopsproducts', function (Blueprint $table) {
            //
        });
    }
}
