<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

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
            $table->bigIncrements('id');
            $table->string('username', 64)->nullable(false)->default('');
            $table->string('email')->unique()->nullable(false)->default('');
            $table->string('password')->nullable(false)->default('');
            $table->string('nick_name', 64)->nullable(true);
            $table->string('phone')->nullable(true);
            $table->text('url_img')->nullable(true);
            $table->enum('role', ['Admin', 'Normal'])->default('Normal');
            $table->string('description', 255)->nullable(true);
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
