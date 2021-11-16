<?php


namespace App\Pos\Services\Purchases;


use App\Pos\Repository\Purchases\PurchasesRepo;
use App\Pos\Services;
use Validator;


class PurchasesServices extends Services
{
    private $purchasRepo ;

    public function __construct()
    {
        $this->purchasRepo = new PurchasesRepo();
    }

    public function get()
    {
        return $this->purchasRepo->get();
    }

    public function add($data)
    {
        // rules to valid nullable
        $rules = [
            'name' => 'required|max:249',
            'data_ion' => 'required|date',
            'product.*' => 'required|integer',
            'count.*' => 'required|integer',
            'pruch_prices.*' => 'required|numeric',
            'prices.*' => 'required|numeric',

        ];

        // vaild
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            // set erros
            //  return   $validator->errors();
            $this->setError($validator->errors());
            return false;
        }

        if ($this->purchasRepo->add($data)) {
            return true;
        }

        $this->setError(['هناك خطاء ..برجاء المحاوله مره اخري .. !']);
        return false;
    }

    public function getByID($id = 0)
    {
       return $this->purchasRepo->getByid($id);
    }

    public function Search($data)
    {
        return $this->purchasRepo->search($data);
    }

}