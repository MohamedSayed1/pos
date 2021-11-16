<?php


namespace App\Http\Controllers;


use App\Http\Interfaces\user;

class testinter extends Controller
{

    private $usint;

    public function __construct(user $user)
    {
        $this->usint = $user;
    }

    public function add()
    {
        return $this->usint->add();
    }
}