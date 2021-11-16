<?php


namespace App\Pos\Services\Purchases;


use App\Pos\Repository\Purchases\PurchaseDetialsRepo;
use App\Pos\Services;

class PurchasesDetailsServices extends Services
{

    private $details;

    public function __construct()
    {
        $this->details = new PurchaseDetialsRepo();
    }

    public function get($id = 0)
    {
        return $this->details->get($id);
    }

    public function getByID($id)
    {
        return $this->details->get($id);
    }

    public function Search($data)
    {
      return $this->details->Search($data);
    }

}