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
        Schema::create('event', function (Blueprint $table) {
            $table->id();
            $table->string('env_number');
            $table->string('env_name');
            $table->string('env_loc');
            $table->date('env_date');
            $table->time('env_st_time');
            $table->time('env_end_time');
            $table->string('env_person_name');
            $table->string('env_person_ph');
            $table->string('env_status');
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
        Schema::dropIfExists('event');
    }
};
