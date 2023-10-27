<?php

namespace App\Enums;

enum StatusEnum: int
{
    case ACTIVE     = 1;
    case INACTIVE   = 0;

    case   PENDING     = 2;
    case   PROCESSING  = 3;
    case   COMPLETED   = 4;
}
