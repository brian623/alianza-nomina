<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();

            $table->string('first_name');
            $table->string('last_name');
            $table->string('identification')->unique();
            $table->string('phone')->nullable();
            $table->string('address')->nullable();

            $table->unsignedBigInteger('city_id')->nullable();
            $table->unsignedBigInteger('department_id')->nullable();
            $table->unsignedBigInteger('boss_id')->nullable();

            $table->timestamps();
            $table->softDeletes();

            
            // $table->foreign('boss_id')->references('id')->on('employees');
        });
    }

    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
