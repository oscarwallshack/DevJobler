<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Company extends Model
{
    use HasFactory;

    protected $fillable = [
        'employer_name',
        'employer_surname',
        'employer_email',
        'company_name',
        'company_tel_num',
        'company_address',
        'company_nip',
        'company_website',
        'company_description',
        'company_image_src',
        'company_offers',
        'user_id',
    ];

    //powiązanie użytkownika z profilem firmy
   
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }

    // powiązanie ofert z firmą

    public function offers():HasMany
    {
        return $this->hasMany(Product::class);
    }
}

