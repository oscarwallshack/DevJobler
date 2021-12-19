<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTableZABEZPIECZENIE extends Migration
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
            $table->string('offer_company_name')->nullable();   //nazwa firmy
            $table->string('offer_tel_num')->nullable();
            $table->string('offer_email')->nullable();
            $table->string('offer_adress')->nullable();  //adres firmy
            $table->string('offer_title')->nullable();   //tytuł oferty
            $table->string('offer_description')->nullable();  //opis stanowiska
            $table->string('salary')->nullable();  //wynagrodzenie
            $table->string('offer_location')->nullable(); //zdalna/na miejscu
            $table->string('offer_employment_type')->nullable();    //typ umowy UoP, B2B
            $table->string('offer_working_hours')->nullable();    //godziny pracy
            $table->string('offer_technologies')->nullable();    //technologie
            $table->string('offer_requirements')->nullable();    //wymagania

           
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
        Schema::dropIfExists('offers');
    }
}
