<?php

namespace App\Enums;

enum StatusEnum: int
{
    case ACTIVE     = 1;
    case INACTIVE   = 0;

    case   PENDING     = 10;
    case   PROCESSING  = 2;
    case   COMPLETED   = 3;
}
