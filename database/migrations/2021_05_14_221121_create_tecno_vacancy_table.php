<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTecnoVacancyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tecnology_vacancy', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('tecnology_id')->unsigned();
            $table->bigInteger('vacancy_id')->unsigned();

            $table->timestamps();

            $table->foreign('tecnology_id')->references('id')->on("tecnologies")
            ->onDelete('cascade')
            ->onUpdate('cascade');

            $table->foreign('vacancy_id')->references('id')->on("vacancies")
            ->onDelete('cascade')
            ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tecno_vacancy');
    }
}
