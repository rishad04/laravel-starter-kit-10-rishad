<?php

namespace App\Enums;

enum TodoStatusEnum: int
{
    case   PENDING     = 1;
    case   PROCESSING  = 2;
    case   COMPLETED   = 3;
}
