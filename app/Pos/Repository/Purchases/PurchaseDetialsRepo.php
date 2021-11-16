<?php


namespace App\Pos\Repository\Purchases;


use App\Pos\Model\Products\Products;
use App\Pos\Model\Purchases\PurchasesDetails;

class PurchaseDetialsRepo
{

    private $detils;

    public function __construct()
    {
        $this->detils = new PurchasesDetails();
    }

    public function get($id)
    {
        return $this->detils->with('Product')->where('pursh_id',$id)->get();
    }

    public function Search($data)
    {
        $id = $data['product_id'];
        $dataFrom = $data['data_from'];
        $dataTo = $data['date_at'];

        return $this->detils->with('Product','purchases')->where('prod_id',$id)
            ->when($dataFrom , function ($q) use ($dataFrom,$dataTo) {
                return $q->whereBetween('created_at', [$dataFrom, $dataTo]);
            })->orderBy('updated_at', 'DESC')->get();
    }

}