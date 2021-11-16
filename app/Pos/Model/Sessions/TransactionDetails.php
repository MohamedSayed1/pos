<?php


namespace App\Pos\Model\Sessions;


use Illuminate\Database\Eloquent\Model;

class TransactionDetails extends Model
{
    protected $table      = "transaction_details";
    protected $primaryKey = "details_id";

    public function getProduct()
    {
        return $this->belongsTo('App\Pos\Model\Products\Products','pro_id','product_id');
    }

    public function getTrances()
    {
        return $this->belongsTo('App\Pos\Model\Sessions\Transaction','trans_id','transaction_id');
    }
}