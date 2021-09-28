<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLabResultsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lab_results', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('test_id');
            $table->unsignedBigInteger('request_id');
            $table->unsignedBigInteger('technician_id');
            $table->longText('result');
            $table->longText('description');

            $table->timestamps();
            $table->foreign('test_id')->references('id')->on('lab_tests')->onDelete('CASCADE');
            $table->foreign('request_id')->references('id')->on('lab_requests')->onDelete('CASCADE');
            $table->foreign('technician_id')->references('id')->on('lab_technicians')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lab_results');
    }
}
