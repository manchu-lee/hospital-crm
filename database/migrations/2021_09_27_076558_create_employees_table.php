<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('department_id');
            $table->unsignedBigInteger('location_id');
            $table->unsignedBigInteger('occupation_id');
            $table->unsignedBigInteger('shift_id');
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('hire_date');

            $table->timestamps();

            $table->foreign('department_id')->references('id')->on('departments')->onDelete('CASCADE');
            $table->foreign('location_id')->references('id')->on('locations')->onDelete('CASCADE');
            $table->foreign('occupation_id')->references('id')->on('occupations')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
