<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePermissionProfileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('permission_profile', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('permission_id');
            $table->unsignedBigInteger('profile_id');

            $table->foreign ('permission_id')
                            ->references('id')
                            ->on('permissions')
                            ->on_delete('cascade');

            $table->foreign ('profile_id')
                            ->references('id')
                            ->on('profiles')
                            ->on_delete('cascade');


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission_profile');
    }
}
