<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Offer extends Model
{
    use HasFactory;

    protected $fillable = [
        'offer_name',   //nazwa oferty - stanowisko
        'offer_company',    //nazwa firmy
        'offer_image_src',  //zdjęcie firmy
        'offer_company_website',
        'offer_email',  
        'offer_tel_num',
        'offer_company_address',    //adres siedziby firymy

        'offer_lvl',   //poziom
        'offer_type',   //typ umowy UoP, zlecenie itd
        'offer_working_place',  // siedziba lub zdalnie
        // 'offer_contract_type',  // pełen wymiar pracy, pół etatu itp

        'offer_recruitment_method', //rekrutacja tradycyjna/zdalna
        // 'offer_working_hours',  //godziny pracy
        'offer_description',    //opis stanowiska
        'offer_requirements',   //wymagania na stanowisku
        'offer_salary_max', // wynagrodzenie maxymalne
        'offer_salary_min', // wynagrodzenie minimalne
        'offer_tasks',   //zadania

        'company_id',   //id employera wystawiającego ofertę 
    ];

    public function company():BelongsTo
    {
        return $this->belongsTo(Company::class);
    }
}
