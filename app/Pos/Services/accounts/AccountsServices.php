<?php


namespace App\Pos\Services\accounts;


use App\Pos\Repository\accounts\AccountRepo;
use App\Pos\Services;

class AccountsServices extends Services
{

    private $account;
    public function __construct()
    {
        $this->account = new AccountRepo();
    }

    public function add($data)
    {

    }

}