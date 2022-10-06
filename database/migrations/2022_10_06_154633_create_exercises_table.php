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
        Schema::create('exercises', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('category_id')->unsigned()->nullable();
            $table->string('name');
            $table->text('description')->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
        Schema::table('exercises', function(Blueprint $table)
        {
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('exercises', function(Blueprint $table)
        {
            $table->dropForeign(['category_id']);
        });
        Schema::dropIfExists('exercises');
    }
};
