<?php


namespace App\Pos\Services\Suppliers;


use App\Pos\Repository\Suppliers\SupplierRepo;
use App\Pos\Services;
use Validator;


class SupplierServices extends Services
{

    private $supplierRepo;
    public function __construct()
    {
        $this->supplierRepo = new SupplierRepo();
    }

    public function getAllSuppliers()
    {
        return $this->supplierRepo->getSuppliers();
    }
    public function getSupplier($id)
    {
        return $this->supplierRepo->getSupplier($id);
    }
    public function Suppliers()
    {
        return $this->supplierRepo->Suppliers();
    }

    public function Search($data)
    {
        return $this->supplierRepo->Search($data);
    }

    public function add($data)
    {
        $rules = [
            'name'        =>'required|max:300',
            'phone'       =>'required|max:19|unique:supplier',

        ];
        // vaild
        $validator = Validator::make($data,$rules);

        if($validator->fails())
        {
            $this->setError($validator->errors());
            return false;
        }

        if($return = $this->supplierRepo->add($data))
            return $return;


        $this->setError(['برجاء المحاوله مره اخري ']);
        return false;
    }

    public function updated($data)
    {
        $rules = [
            'id'          =>'required|numeric',
            'name'        =>'required|max:300',
            'phone'       =>'required|max:19|unique:supplier,phone,'.$data['id'].',supplier_id'

        ];
        // vaild
        $validator = Validator::make($data,$rules);

        if($validator->fails())
        {
            $this->setError($validator->errors());
            return false;
        }

        if($this->supplierRepo->updated($data))
            return true;


        $this->setError(['برجاء المحاوله مره اخري ']);
        return false;
    }
}