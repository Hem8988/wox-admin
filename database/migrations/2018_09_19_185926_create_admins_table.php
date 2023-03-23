<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdminsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
		Schema::create('admins', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
		});
    }

    /**
     * Reverse the migrations.
     * ALTER TABLE `admins` ADD `logout_user` INT(10) NULL DEFAULT '1' COMMENT '1 = false,2 = true' AFTER `aadhaar_card`;
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('admins');
    }
}
