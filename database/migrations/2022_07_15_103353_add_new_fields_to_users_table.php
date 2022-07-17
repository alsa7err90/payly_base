<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) { 
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('balnce')->default(0);
            $table->string('state')->default(0);
            $table->string('icon')->nullable();
            $table->string('name_company')->nullable();
            $table->string('phone')->nullable();
            $table->string('phone_verified_at')->nullable(); 

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
