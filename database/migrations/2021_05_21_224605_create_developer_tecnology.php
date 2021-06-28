<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeveloperTecnology extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('developer_tecnology', function (Blueprint $table) {
            // $table->id();
            $table->timestamps();
            $table->primary(['tecnology_id','developer_id']);
            $table->bigInteger('tecnology_id')->unsigned();
            $table->bigInteger('developer_id')->unsigned();
       
            $table->foreign('tecnology_id')->references('id')->on("tecnologies")
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
        Schema::dropIfExists('developer_tecnology');
    }
}
