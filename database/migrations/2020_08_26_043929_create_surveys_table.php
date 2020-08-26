<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSurveysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surveys', function (Blueprint $table) {
            $table->increments('id');
            $table->string('fullname',50);
            $table->tinyInteger('gender');
            $table->integer('age_id');
            $table->char('email',255);
            $table->tinyInteger('is_send_mail');
            $table->text('feedback');
            $table->timestamp('deleted_at');
            $table->timestamps();
            
        });
        Schema::create('ages', function (Blueprint $table) {
            $table->increments('id');
            $table->string('age',50);
            $table->tinyInteger('sort');
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
        Schema::dropIfExists('surveys');
    }
}
