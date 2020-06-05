<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InsertRolesToRolesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::table('roles')->insert(
            array(
                'id' => 1,
                'name' => 'Admin',
            )
        );
        DB::table('roles')->insert(
            array(
                'id' => 2,
                'name' => 'Lecturer',
            )
        );
        DB::table('roles')->insert(
            array(
                'id' => 3,
                'name' => 'Student',
            )
        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            //
        });
    }
}
