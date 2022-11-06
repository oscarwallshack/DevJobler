<?php

namespace App\Enums;

class UserRole
{
    const EMPLOYEE = 'employee';
    const COMPANY = 'employer';

    const TYPES = [
        self::EMPLOYEE,
        self::COMPANY
    ];

}