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
        if (!Schema::hasTable('users')) {
            Schema::create('users', function (Blueprint $table) {
                $table->uuid('user_id')->primary();
                $table->string('email', 64);
                $table->string('password', 64);
                $table->string('name', 64);
                $table->tinyInteger('role_id');
                $table->string('mobile', 64)->nullable();
                $table->string('avatar', 128)->nullable();
                $table->uuid('created_by');
                $table->uuid('updated_by');
                $table->timestamps();
                $table->softDeletes();
                $table->unique('email');
            });
        }
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
