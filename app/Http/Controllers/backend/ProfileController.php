<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Repositories\User\UserInterface;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    protected $repo;
    public function __construct(UserInterface $repo)
    {
        $this->repo = $repo;
    }
}
