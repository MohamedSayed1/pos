<?php


namespace App\Pos\Repository\accounts;


use App\Pos\Model\accounts\Accounts;

class AccountRepo
{
    private $account;
    public function __construct()
    {
        $this->account = new Accounts();
    }
    public function add($data)
    {
        if($data['column'] == "supplier_id")
            $this->account->supplier_id = $data['id'];
        else
            $this->account->customer_id  = $data['id'];


        $this->account->date_start  = date('Y-m-d');
        $this->account->creditor  = isset($data['creditor'])?$data['creditor']:0;
        $this->account->paid  = isset($data['paid'])?$data['paid']:0;
        $this->account->returns  = 0;
        $this->account->type  = "open";
       return  $this->account->save();
    }
    // updated to close
    public function updateToClosse($data)
    {
        //
        $close = $this->account->where([
            [$data['column'],$data['id']],['type','open']])->first();

        $close->type ="close";
        $close->date_end =date('Y-m-d');
        return $close->save();
    }
    // update Paid
    public function addPaid($data)
    {
        $row = $this->account->where([
            [$data['column'],$data['id']],['type','open']])->first();

        $row->paid = $row->paid + $data['paid'];
        return $row->save();
    }
        // update Return
    public function addReturns($data)
    {
        $row = $this->account->where([
            [$data['column'],$data['id']],['type','open']])->first();

        $row->returns  = $row->returns + $data['return'];
        return $row->save();
    }
    // if add a new purchases
    public function updated($data)
    {
        $row = $this->account->where([
            [$data['column'],$data['id']],['type','open']])->first();

        $row->paid = $row->paid + $data['paid'];
        $row->creditor = $row->creditor + $data['creditor'];
        return $row->save();
    }
}