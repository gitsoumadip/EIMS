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
        Schema::create('book_event', function (Blueprint $table) {
            $table->id();
            $table->string('client_name');
            $table->string('clint_phone');
            $table->string('clint_email');
            $table->string('clint_requirement');
            $table->string('dateOfProgram');
            $table->string('client_discussion_details');
            $table->string('client_reference');
            $table->string('status');
            $table->timestamps();
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
        Schema::dropIfExists('book_event');
    }
};
