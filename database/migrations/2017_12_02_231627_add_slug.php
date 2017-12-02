<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSlug extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->string('slug')->after('scores');
        });
        Schema::table('hospitals', function (Blueprint $table) {
            $table->string('slug')->after('description');
        });
        Schema::table('specialists', function (Blueprint $table) {
            $table->string('slug')->after('description');
        });
        Schema::table('services', function (Blueprint $table) {
            $table->string('slug')->after('name');
        });
        Schema::table('posts', function (Blueprint $table) {
            $table->string('slug')->after('content');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('doctors', function (Blueprint $table) {
            $table->dropcolumn(['slug']);
        });
        Schema::table('hospitals', function (Blueprint $table) {
            $table->dropcolumn(['slug']);
        });
        Schema::table('specialists', function (Blueprint $table) {
            $table->dropcolumn(['slug']);
        });
        Schema::table('services', function (Blueprint $table) {
            $table->dropcolumn(['slug']);
        });
        Schema::table('posts', function (Blueprint $table) {
            $table->dropcolumn(['slug']);
        });
    }
}
