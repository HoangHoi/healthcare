<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateDatabase extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('phone_number')->after('email')->nullable();
            $table->boolean('is_actived')->after('password')->default(true);
            $table->softDeletes()->after('remember_token');
        });

        Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('phone_number')->nullable();
            $table->string('password');
            $table->boolean('is_actived')->default(true);
            $table->rememberToken();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::table('requests', function (Blueprint $table) {
            $table->dropColumn(['timeable_id', 'timeable_type']);
            $table->dateTime('date')->after('address');
            $table->softDeletes()->after('status');

            $table->string('email')->nullable()->change();
            $table->string('address')->nullable()->change();
            $table->smallInteger('status')->nullable()->change();
        });

        Schema::table('doctors', function (Blueprint $table) {
            $table->string('avatar')->nullable()->change();
            $table->text('info')->nullable()->change();
            $table->integer('examination_fee')->default(200000)->change();
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
            $table->dropColumn(['phone_number', 'deleted_at', 'is_actived']);
        });
        Schema::dropIfExists('admins');

        Schema::table('requests', function (Blueprint $table) {
            $table->morphs('timeable');
            $table->dropColumn(['date', 'deleted_at']);
        });
    }
}
