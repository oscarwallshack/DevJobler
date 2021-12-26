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
        'employee_adress',
        'employee_description',
        'employee_status',
        'employee_education',
        'user_id',
    ];

    //powiązanie użytkownika z pracownika
    
    public function user(): BelongsTo{
        return $this->belongsTo(User::class);
    }
}
