<?php


namespace App\Pos\Services\Sessions;


use App\Pos\Repository\Sessions\TransactionDetailsRepo;
use App\Pos\Services;

class TransactionDetailsServices extends Services
{

    private $transactionDetailRepo;

    public function __construct()
    {
        $this->transactionDetailRepo = new TransactionDetailsRepo();
    }

    public function getByTrans($id=0)
    {
        return $this->transactionDetailRepo->getByTransactionId($id);
    }

    public function getByproductAndStatus($data)
    {
        return $this->transactionDetailRepo->getBYProduct($data);
    }
}