<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stock', function (Blueprint $table) {
            $table->increments('stock_id');
            $table->foreignId('stk_name_id');
            $table->foreignId('stk_brand_id');
            $table->foreignId('stk_category_id');
            $table->foreignId('stk_store_Loc_id');
            $table->foreignId('stk_model_no');
            $table->string('stk_serial_no');
            $table->string('stk_status');
            $table->timestamps();
            $table->softDeletes();

            // $table->foreign('stk_name_id')->references('item_id')->on('ItemTbls')->onDelete('cascade');
            // $table->foreign('stk_category_id')->references('cat_id')->on('category_masters')->onDelete('cascade');
            // $table->foreign('stk_brand_id')->references('brand_id')->on('brand_masters')->onDelete('cascade');
            // $table->foreign('stk_store_Loc_id')->references('id')->on('StoreMaster')->onDelete('cascade');
            // $table->foreign('stk_model_no')->references('id')->on('modelno')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock');
    }
};
