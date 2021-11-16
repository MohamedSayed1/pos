<?php


namespace App\Pos\Repository\Suppliers;


use App\Pos\Model\Suppliers\Supplier;

class SupplierRepo
{

    private $supplier;
    public function __construct()
    {
        $this->supplier = new Supplier();
    }


    public function add($data)
    {
        $this->supplier->name = $data['name'];
        $this->supplier->phone = $data['phone'];
        $this->supplier->address = $data['address'];
        $this->supplier->company = $data['company'];
         if($this->supplier->save())
             return [$this->supplier->supplier_id,$this->supplier->name ];


         return false;
    }

    public function updated($data)
    {
        $supplier = $this->supplier->find($data['id']);
        $supplier->name = $data['name'];
        $supplier->phone = $data['phone'];
        $supplier->address = $data['address'];
        $supplier->company = $data['company'];
        return $supplier->save();
    }

    public function getSupplier($id)
    {
        return $this->supplier->find($id);
    }

    public function getSuppliers()
    {
        return $this->supplier->get();
    }
    public function Suppliers()
    {
        return $this->supplier->orderBy('updated_at', 'DESC')->limit(50)->get();
    }

    public function Search($data)
    {
        $name = $data['name'];
        $phone = $data['phone'];

        return  $this->supplier->orderBy('updated_at', 'desc')
            ->when($name , function ($q) use ($name) {
                return   $q->where('name', 'like', '%' . $name . '%');
            })->when($phone , function ($q) use ($phone) {
                return $q->where('phone','like','%'.$phone.'%');
            })->get();
    }
}