<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalariesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('salaries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('employee_id');
            $table->unsignedBigInteger('fund_id');
            $table->string('basic');
            $table->string('allowance');
            $table->string('tax');
            $table->string('gross_salary');
            $table->string('net_salary');
            $table->timestamps();

            $table->foreign('employee_id')->references('id')->on('employees')->onDelete('CASCADE');
            $table->foreign('fund_id')->references('id')->on('provident_funds')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('salaries');
    }
}
