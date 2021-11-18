<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Pola do dodania w bazie:
     * 1. status: pracownik/pracodawca
     * 2. zdjęcie
     * 3. opis
     * 4. miejsce na plik
     * 5. zarobki
     * https://www.devopsschool.com/blog/how-to-add-a-column-or-columns-to-an-existing-table-using-migration-in-laravel/
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
