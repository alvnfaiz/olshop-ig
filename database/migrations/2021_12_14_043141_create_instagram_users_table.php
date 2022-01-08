<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInstagramUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('instagram_users', function (Blueprint $table) {
            $table->id();
            $table->string('username');
            $table->string('password');
            $table->string('full_name')->nullable();
            $table->text('profile_picture')->nullable();
            $table->string('bio')->nullable();
            $table->string('website')->nullable();
            $table->string('media_count')->nullable();
            $table->string('follows_count')->nullable();
            $table->string('followed_by_count')->nullable();
            $table->string('is_private')->nullable();
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
        Schema::dropIfExists('instagram_users');
    }
}
