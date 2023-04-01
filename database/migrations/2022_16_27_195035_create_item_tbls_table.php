<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
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
        Schema::create('item_tbls', function (Blueprint $table) {
            $table->increments('item_id');
            $table->unsignedInteger('products_id');
            $table->unsignedInteger('category_id');
            $table->unsignedInteger('brand_id');
            // $table->enum('item_type', ['inhouse', 'outhouse'])->default('inhouse');
            $table->string('item_sl_no',255)->nullable();
            $table->unsignedInteger('models_id')->nullable();
            $table->string('item_approx_price');
            // $table->bigInteger('item_qty')->nullable();
            $table->unsignedInteger('stores_id');
            $table->text('item_desc')->nullable();
            $table->enum('item_status', ['available', 'unavailable', 'damage'])->default('available');
            $table->bigInteger('item_total_qty')->nullable();
            $table->bigInteger('item_sale_qty')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
            $table->softDeletes();

            $table->foreign('category_id')->references('cat_id')->on('category_masters')->onDelete('cascade');
            $table->foreign('brand_id')->references('brand_id')->on('brand_masters')->onDelete('cascade');
            $table->foreign('products_id')->references('product_id')->on('product_master')->onDelete('cascade');
            $table->foreign('models_id')->references('mdl_id')->on('model_master')->onDelete('cascade');
            $table->foreign('stores_id')->references('store_id')->on('store_master')->onDelete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('item_tbls');
    }
};
