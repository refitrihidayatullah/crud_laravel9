<?php

use Brick\Math\BigInteger;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->bigIncrements('student_id');
            $table->bigInteger('major_id')->unsigned();
            $table->string('nim', 5);
            $table->string('name', 50);
            $table->string('address', 100);
            $table->timestamps();
        });
        Schema::table('students', function (Blueprint $table) {
            $table->foreign('major_id')->references('major_id')->on('majors')
                ->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('students');
    }
};
