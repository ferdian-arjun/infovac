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
            $table->id();
            $table->string('username')->unique();
            $table->string('password');
            $table->string('email', 32)->unique();
            $table->string('nama', 32);
            $table->string('alamat', 128)->nullable();
            $table->char('provinces_id', 2)->nullable();
            $table->char('cities_id', 4)->nullable();
            $table->char('districts_id', 7)->nullable();
            $table->string('telp', 32);
            $table->enum('level', ['admin', 'member']);
            $table->enum('status', ['active', 'inactive'])->default('active');
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
