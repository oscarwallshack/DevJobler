<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            // imie osoby prowadzącej profil firmowy
            $table->string('employer_name');
            // nazwisko osoby prowadzącej profil firmowy
            $table->string('employer_surname');
            // email   
            $table->string('employer_email');
            // nazwa firmy
            $table->string('company_name')->nullable();
            // nr. telefonu
            $table->string('company_tel_num', 9)->nullable();
            // adres siedziby   
            $table->string('company_address')->nullable();
            // numer nip       
            $table->string('company_nip')->nullable();
            // strona internetowa    
            $table->string('company_website')->nullable();
            // opis firmy    
            $table->string('company_description', 1500)->nullable();
            // zdjęcie profilowe 
            $table->string('company_image_src')->nullable();
            // ilość aktywnych ofert
            $table->string('company_offers')->nullable();
            // data utworzenia konta
            $table->timestamps();

            $table->foreignId('user_id')->constrained()->nullable()->onDelete('cascade'); // relacja z tabelą user
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('companies');
    }
}
