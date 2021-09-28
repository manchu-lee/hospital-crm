<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestedLabTestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('requested_lab_tests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('lab_request_id');
            $table->unsignedBigInteger('lab_test_id');
            $table->longText('description');
            $table->timestamps();

            $table->foreign('lab_request_id')->references('id')->on('lab_requests')->onDelete('CASCADE');
            $table->foreign('lab_test_id')->references('id')->on('lab_requests')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('requested_lab_tests');
    }
}
