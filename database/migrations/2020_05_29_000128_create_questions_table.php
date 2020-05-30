<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->integer('exam_id');
            $table->text('question');
            $table->string('choice_1');
            $table->string('choice_2');
            $table->string('choice_3');
            $table->string('choice_4');
            $table->integer('correct');
            $table->timestamps();
            //TODO $table->string('type'); // multi choice or text
            //TODO $table->integer('choice_num');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('questions');
    }
}
