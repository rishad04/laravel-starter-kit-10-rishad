<?php

namespace App\Repositories;

use App\Interfaces\AuthInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use DB;
use Illuminate\Support\Facades\Mail;

class AuthRepository implements AuthInterface
{
}
