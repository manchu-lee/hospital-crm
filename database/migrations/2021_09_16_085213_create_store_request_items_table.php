<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStoreRequestItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('store_request_items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('store_request_id');
            $table->string('name');
            $table->string('model')->nullable();

            $table->foreign('store_request_id')->references('id')->on('store_request')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('store_request_items');
    }
}
