<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRegistrationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::dropIfExists('migration');
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();
            $table->string('username')->nullable();
            $table->string('email')->unique();
            $table->string('password')->nullable();
            $table->string('provider_user_id');
            $table->string('user_type')->nullable();
            $table->string('email_verification')->default('not_verified');
            $table->string('image')->nullable();
            $table->string('event_list')->nullable();
            $table->string('fullname')->nullable();
            $table->string('mobile')->nullable();
            $table->string('dob')->nullable();
            $table->string('address')->nullable();
            $table->string('about')->nullable();
            $table->string('gender')->nullable();
            $table->string('pubg_id')->nullable();
            $table->string('cod_id')->nullable();
            $table->string('ff_id')->nullable();
            $table->string('fortnite_id')->nullable();
            $table->string('login_stamp')->nullable();
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
        Schema::dropIfExists('registrations');
    }
}
