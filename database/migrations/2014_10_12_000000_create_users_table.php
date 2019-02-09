<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('username')->unique();
            $table->string('admin');
            $table->string('access');
            $table->string('zone')->nullable();
            $table->string('district')->nullable();
            $table->string('school')->nullable();
            $table->string('grade')->nullable();
            $table->string('gender');
            $table->string('name');
            $table->string('l_name');
            $table->string('fa_name')->nullable();
            $table->string('birth')->nullable();
            $table->string('birth_location')->nullable();
            $table->string('religion')->nullable();
            $table->string('last_score')->nullable();
            $table->string('phone_home')->nullable();
            $table->string('mobile');
            $table->string('fa_job')->nullable();
            $table->string('phone_parent')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
