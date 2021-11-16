<?php


namespace App\Pos\Repository\Purchases;


use App\Pos\Model\Products\Products;
use App\Pos\Model\Purchases\Purchases;
use App\Pos\Model\Purchases\PurchasesDetails;


class PurchasesRepo
{
    private $purchas ;

    public function __construct()
    {
        $this->purchas = new Purchases();
    }

    public function get()
    {
        return $this->purchas->orderBy('updated_at', 'desc')->limit(400)->get();
    }

    public function getByid($id = 0)
    {
        return $this->purchas->find($id);
    }



    public function add($data)
    {
        // add pusher
        $this->purchas->in_num         = "p-".now()->year .'-'.$this->getNumper();
        $this->purchas->supplier_name  = $data['name'];
        $this->purchas->in_data        = $data['data_ion'];
        if($this->purchas->save())
        {
            $total=0;
            //add deitls  + // updated product (count + prices
            $count = count($data['product']);
            for ($i = 0 ; $i < $count ; $i++)
            {
                //add detils
                $detils = new PurchasesDetails();
                $detils->pursh_id     = $this->purchas->purchases_id;
                $detils->prod_id      = $data['product'][$i];
                $detils->count        = $data['count'][$i];
                $detils->pruch_prices = $data['pruch_prices'][$i];
                $detils->prices       = $data['prices'][$i];
                $detils->save();
                $total += $data['pruch_prices'][$i] * $data['count'][$i] ;
                // updated product (count + prices
                $product = Products::find($data['product'][$i]);
                $product->count        = $product->count + $data['count'][$i];
                $product->pruch_prices = $data['pruch_prices'][$i];
                $product->prices       = $product->prices >= $data['prices'][$i] ?$product->prices:$data['prices'][$i] ;
                $product->save();
            }

            $this->purchas->in_total       = $total;
            $this->purchas->save();
            return true;
        }
        return false;
    }

    public function search($data)
    {
        $name = $data['name'];
        $dataFrom = $data['data_from'];
        $dataTo = $data['date_at'];
       return  $this->purchas->orderBy('updated_at', 'desc')
            ->when($name , function ($q) use ($name) {
                return   $q->where('supplier_name', 'like', '%' . $name . '%');

            })->when($dataFrom , function ($q) use ($dataFrom,$dataTo) {
               return $q->whereBetween('in_data', [$dataFrom, $dataTo]);
            })->get();
    }

    private function getNumper()
    {
        $num =  $this->purchas->latest('purchases_id')->first();
        return $num == null ? 1 : $num->purchases_id + 1;

    }
}