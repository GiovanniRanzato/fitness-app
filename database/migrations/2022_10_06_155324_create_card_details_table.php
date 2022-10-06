<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('card_details', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('card_id')->unsigned()->nullable();
            $table->bigInteger('exercize_id')->unsigned()->nullable();
            $table->integer('quantity')->unsigned()->nullable();
            $table->integer('weight')->unsigned()->nullable();
            $table->integer('duration')->unsigned()->nullable();
            $table->integer('recovery_time')->unsigned()->nullable();
            $table->timestamps();
    
        });
        Schema::table('card_details', function(Blueprint $table)
        {
            $table->foreign('card_id')->references('id')->on('cards')->onDelete('cascade');
            $table->foreign('exercize_id')->references('id')->on('exercises')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('card_details', function(Blueprint $table)
        {
            $table->dropForeign(['card_id']);
            $table->dropForeign(['exercize_id']);
        });
        Schema::dropIfExists('card_details');
    }
};
