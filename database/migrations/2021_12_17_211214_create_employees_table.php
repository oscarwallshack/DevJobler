<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('employee_name'); //imie pracodawcy
            $table->string('employee_surname');   //nazwisko
            $table->string('employee_email'); // email
            $table->string('employee_tel_num')->nullable();   //nr tele
            $table->string('employee_adress')->nullable();    //adres zamieszkania
            $table->string('employee_description')->nullable();   //opis
            $table->string('employee_image_src')->nullable();   //zdj
            $table->string('employee_status')->nullable();  //obecne zatrudnienie
            $table->string('employee_education')->nullable(); //edukacja 
            $table->timestamps();

            $table->foreignId('user_id')->references('id')->on('users')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employees');
    }
}
