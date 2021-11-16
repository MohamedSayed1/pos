<?php


namespace App\Pos\Repository\Expenses;


use App\Pos\Model\Expenses\Expenses;

class ExpensesRepo
{
    private $expRepo ;

    public function __construct()
    {
        $this->expRepo = new Expenses();
    }

    public function add($data)
    {
        $this->expRepo->split_id = $data['split_id'];
        $this->expRepo->desc     = $data['desc'];
        $this->expRepo->prices   = $data['paid'];

        return $this->expRepo->save();
    }


    public function updated($data)
    {
        $exp = $this->expRepo->find($data['id']);

        $exp->split_id = $data['split_id'];
        $exp->desc     = $data['desc'];
        $exp->prices     = $data['paid'];

        return $exp->save();

    }
    public function del($id)
    {
        return $this->expRepo->find($id)->delete();
    }


    public function getall()
    {
        return $this->expRepo->with('getSlit')->get();
    }

    public function getByid($id)
    {
        return $this->expRepo->with('getSlit')->find($id);
    }

    public function search($data)
    {
        $exp = $data['exp'];
        $dataFrom = $data['data_from'];
        $dataTo = $data['date_at'];

        return $this->expRepo->orderBy('updated_at', 'desc')
            ->when($exp , function ($q) use ($exp) {
                return   $q->where('split_id',$exp);
            })->when($dataFrom , function ($q) use ($dataFrom,$dataTo) {
                return $q->whereBetween('created_at', [$dataFrom, $dataTo]);
            })->get();

    }

}