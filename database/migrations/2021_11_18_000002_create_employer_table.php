<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployerTableZABEZPIECZENIE extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employers', function (Blueprint $table) {
            $table->id();
            $table->string('employer_name')->nullable(); //imie pracodawcy
            $table->string('employer_surname')->nullable(); //nazwisko pracodawcy
            $table->string('comp_name')->nullable(); //nazwa firmy
            $table->string('comp_image_src')->nullable(); //zdjęcie firmy
            $table->string('employer_email')->nullable(); // email
            $table->string('comp_tel_num')->nullable();  //tele num.
            $table->string('comp_adress')->nullable(); // adres
            $table->string('comp_description')->nullable(); // opis firmy    
            $table->string('benefits')->nullable(); //benefity
            $table->string('offer_num')->nullable(); //ilość ofert

            
            // $table->timestamp('email_verified_at')->nullable();    ===> to wszystko będzie jako klucze obce
            // $table->string('password'); //hasło
            // $table->rememberToken();
            // $table->timestamps();
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
        Schema::dropIfExists('employers');
    }
}
