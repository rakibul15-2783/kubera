<?php



namespace App\Enums;

enum UserRole:int
{
    const Investor = 1;
    const Entrepreneur = 2;
}


// usage"
// UserRole::Investor
// will provide the result 1
