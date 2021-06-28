<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableDeveloperVacancy extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('developer_vacancy', function (Blueprint $table) {
            
            $table->unsignedBigInteger('vacancy_id');
            $table->unsignedBigInteger('developer_id');

            $table->timestamps();

            $table->primary(['vacancy_id', 'developer_id']);

            $table->foreign('vacancy_id')->references('id')->on("vacancies")
                ->onDelete('cascade')
                ->onUpdate('cascade');

            $table->foreign('developer_id')->references('user_id')->on("developers")
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
        //
    }
}