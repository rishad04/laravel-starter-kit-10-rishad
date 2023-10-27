<?php

namespace App\Enums;

enum StatusEnum: int
{
        // default 
    case INACTIVE   = 0;
    case ACTIVE     = 1;

    case   PENDING     = 2;
    case   PROCESSING  = 3;
    case   COMPLETED   = 4;
}
