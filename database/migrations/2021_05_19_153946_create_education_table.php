<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEducationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //creates education table
        Schema::create('education', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nameEducation');
            $table->string('level');

        });
        //crea tabla intermedia entre desarrollador y educacion
        Schema::create('developer_education', function(Blueprint $table){
            $table->unsignedBigInteger('education_id');
            $table->unsignedBigInteger('developer_id');
            
            $table->timestamps();

            $table->primary(['education_id', 'developer_id']);

            $table->foreign('education_id')
                ->references('id')
                ->on('education')
                ->onDelete('cascade');
            
            $table->foreign('developer_id')
                ->references('user_id')
                ->on('developers')
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
        Schema::dropIfExists('education');
    }
}
