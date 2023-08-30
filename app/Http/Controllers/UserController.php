<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Repository\UserRepositoryInterface;

class UserController extends Controller
{
    protected $UserRepository;

    public function __construct(UserRepositoryInterface $UserRepository)
    {
        $this->UserRepository = $UserRepository;
    }

    public function index(Request $request)
    {
        return $this->UserRepository->all();
    }
}
