<?php


namespace App\Pos\Model\Sessions;


use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{

    protected $table      = "transaction";
    protected $primaryKey = "transaction_id";


    public function get()
    {
        return $this->hasMany('App\Pos\Model\Sessions\TransactionDetails','trans_id','transaction_id')
            ->join('product','product.product_id','=','transaction_details.pro_id');
    }

}