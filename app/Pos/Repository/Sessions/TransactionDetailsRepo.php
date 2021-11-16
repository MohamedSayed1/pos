<?php


namespace App\Pos\Repository\Sessions;


use App\Pos\Model\Sessions\TransactionDetails;
use Illuminate\Support\Facades\DB;

class TransactionDetailsRepo
{
    private $tranDetails ;

    public function __construct()
    {
        $this->tranDetails = new TransactionDetails();
    }

    public function getByTransactionId($id =0)
    {
        return $this->tranDetails->with('getProduct')->where('trans_id',$id)->get();
    }

    public function getBYProduct($data)
    {
        $id = $data['product_id'];
        $dataFrom = $data['data_from'];
        $dataTo = $data['date_at'];
        return $this->tranDetails->with('getProduct')
            ->where('pro_id',$id)
            ->when($dataFrom , function ($q) use ($dataFrom,$dataTo) {
                return $q->whereBetween('created_at', [$dataFrom, $dataTo]);
            })->orderBy('updated_at', 'DESC')->get();

        //sum(DB::raw('transaction_details.paid * transaction_details.quantity'))

    }
}