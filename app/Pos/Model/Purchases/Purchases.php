<?php


namespace App\Pos\Model\Purchases;


use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{

    protected $table      = "purchases";
    protected $primaryKey = "purchases_id";


    public function getDetilas()
    {
        return $this->hasMany('App\Pos\Model\Purchases\PurchasesDetails','pursh_id','purchases_id');
    }

}