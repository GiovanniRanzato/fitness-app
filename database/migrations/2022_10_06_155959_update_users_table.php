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
        Schema::table('users', function(Blueprint $table) {
            $table->bigInteger('category_id')->unsigned()->nullable()->after('id');
            $table->integer('role')->unsigned()->default(0)->after('password');
            $table->string('second_name')->nullable()->after('role');
            $table->date('birthday')->nullable()->after('second_name');
            $table->string('sex')->nullable()->after('birthday');
            $table->integer('weight')->unsigned()->nullable()->after('sex');
            $table->integer('height')->unsigned()->nullable()->after('weight');
            $table->string('job')->nullable()->after('height');
            $table->string('country')->nullable()->after('job');
            $table->string('city')->nullable()->after('country');
            $table->string('postal_code')->nullable()->after('city');
            $table->string('address')->nullable()->after('postal_code');
            $table->string('phone')->nullable()->after('address');
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
        Schema::table('users', function(Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
            $table->dropColumn('role');
            $table->dropColumn('second_name');
            $table->dropColumn('birthday');
            $table->dropColumn('sex');
            $table->dropColumn('weight');
            $table->dropColumn('height');
            $table->dropColumn('job');
            $table->dropColumn('country');
            $table->dropColumn('city');
            $table->dropColumn('postal_code');
            $table->dropColumn('address');
            $table->dropColumn('phone');
        });
    }
};
