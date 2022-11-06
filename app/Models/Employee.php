<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'employee_name',
        'employee_surname',
        'employee_email',
        'employee_tel_num',
        'employee_address',
        'employee_cv',
        'employee_description',
        'employee_image_src',
        'employee_status',
        'employee_education',
        'employee_skills',
        'user_id',
    ];

    //powiązanie użytkownika z pracownika

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
