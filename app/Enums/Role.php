<?php
namespace App\Enums;


enum Role: int{
    case Admin = 1;
    case Chef = 2;
    case User = 3;
}