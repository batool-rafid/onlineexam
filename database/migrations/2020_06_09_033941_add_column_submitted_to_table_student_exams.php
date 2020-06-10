<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnSubmittedToTableStudentExams extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('student_exams', function (Blueprint $table) {
            $table->boolean('submitted')->default(false);

        });
    }

    /**
     * Reverse the migrationsdfdfdf.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('student_exams', function (Blueprint $table) {
            //
        });
    }
}
