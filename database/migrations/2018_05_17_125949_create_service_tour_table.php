<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServiceTourTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_tour', function (Blueprint $table) {
                $table->increments('id');
                $table->integer('tour_id')->unsigned()->index();
                $table->foreign('tour_id')->references('id')->on('tours')->onDelete('cascade');

                $table->integer('service_id')->unsigned()->index();
                $table->foreign('service_id')->references('id')->on('services')->onDelete('cascade');

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
        Schema::dropIfExists('service_tour');
    }
}
