<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSkillsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {//crea tabla skills
        Schema::create('skills', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->timestamps();
            $table->string('skillName');

        });
        //crea tabla intermedia desarrollador tiene habilidades
        Schema::create('developer_skill',function (Blueprint $table){

            $table->unsignedBigInteger('skill_id');
            $table->unsignedBigInteger('developer_id');
            
            $table->timestamps();

            $table->foreign('skill_id')
                ->references('id')
                ->on('skills')
                ->onDelete('cascade');
            
            $table->foreign('developer_id')
                ->references('user_id')
                ->on('developers')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('skills');
    }
}
