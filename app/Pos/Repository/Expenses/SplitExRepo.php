<?php


namespace App\Pos\Repository\Expenses;

use App\Pos\Model\Expenses\Split_expenses;

class SplitExRepo
{
    private $splitMode;

    public function __construct()
    {
     $this->splitMode = new Split_expenses();
    }


    public function addNew($data)
    {
        $this->splitMode->name = $data['name'];

        return $this->splitMode->save();
    }


    public function getAll()
    {
        return $this->splitMode->get() ;
    }

    public function getOne($id =0)
    {
        return $this->splitMode->find($id);
    }

    public function updated($data)
    {
       $updated =  $this->splitMode->find($data['id']);
       $updated->name = $data['name'];
       return $updated->save();
    }
}