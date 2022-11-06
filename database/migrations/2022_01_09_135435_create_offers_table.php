<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->string('offer_name');   //nazwa oferty - stanowisko
            $table->string('offer_company');    //nazwa firmy
            $table->string('offer_image_src')->nullable();  //zdjęcie firmy
            $table->string('offer_company_website');
            $table->string('offer_email');
            $table->string('offer_tel_num', 9);
            $table->string('offer_company_address');    //adres siedziby firymy
            $table->string('offer_lvl');   //poziom
            $table->string('offer_type');   //typ umowy UoP, zlecenie itd
            $table->string('offer_working_place');  // siedziba lub zdalnie
            // $table->string('offer_contract_type');  // pełen wymiar pracy, pół etatu itp
            $table->string('offer_recruitment_method')->nullable(); //rekrutacja tradycyjna/zdalna
            // $table->string('offer_working_hours')->nullable();  //godziny pracy
            $table->string('offer_salary_max');  //stawka godzinowa maksymalna
            $table->string('offer_salary_min');  //stawka godzinowa minimalna
            $table->string('offer_description', 1500);    //opis stanowiska
            $table->string('offer_requirements', 1500);   //wymagania na stanowisku
            $table->string('offer_tasks');   //zadania

            $table->foreignId('company_id')->references('id')->on('companies')->onDelete('cascade');//id employera wystawiającego ofertę 

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
        Schema::dropIfExists('offers');
    }
}
