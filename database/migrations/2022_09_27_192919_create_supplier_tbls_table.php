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
        Schema::create('supplier_tbls', function (Blueprint $table) {
            $table->increments('sup_id');
            $table->string('sup_name');
            $table->string('sup_company_name');
            $table->string('sup_office_address');
            $table->string('sup_mob_no');
            $table->string('sup_comp_mob_no')->nullable();
            $table->string('sup_email');
            $table->enum('sup_status', ['active', 'inactive'])->default('active');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable()->useCurrentOnUpdate();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('supplier_tbls');
    }
};