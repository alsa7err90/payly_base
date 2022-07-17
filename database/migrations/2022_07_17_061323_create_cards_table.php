<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCardsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('amount'); // ex: 20 
            $table->string('type_amount'); // ex : $ or Diamond
            $table->string('price'); 
            $table->string('currency');
            $table->foreignId('company_id')->on('companies')->references('id')->onDelete('CASCADE')
            ->onUpdate('CASCADE');
            $table->string('image');
            $table->string('state'); 
            $table->string('fee'); 
            $table->string('type_fee');  
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
        Schema::dropIfExists('cards');
    }
}
