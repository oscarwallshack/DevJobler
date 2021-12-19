<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItWorkerTableZABEZPIECZENIE extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workers', function (Blueprint $table) {
            $table->id();
            $table->string('worker_name')->nullable(); //imie pracodawcy
            $table->string('worker_surname')->nullable();   //nazwisko
            $table->string('worker_email')->nullable(); // email
            $table->string('worker_tel_num')->nullable();   //nr tele
            $table->string('worker_adress')->nullable();    //adres zamieszkania
            $table->string('worker_description')->nullable();   //opis
            $table->string('work_status')->nullable();  //obecne zatrudnienie
            $table->string('worker_education')->nullable(); //edukacja 
        });
    }

    /**
     *
     * https://www.devopsschool.com/blog/how-to-add-a-column-or-columns-to-an-existing-table-using-migration-in-laravel/
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('workers');
    }
}
