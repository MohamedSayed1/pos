<?php


namespace App\Pos\Services\Expenses;


use App\Pos\Repository\Expenses\ExpensesRepo;
use App\Pos\Services;
use Validator;

class ExpensesServices extends Services
{

    private $exRepo ;

    public function __construct()
    {
        $this->exRepo = new ExpensesRepo();
    }

    public function gets()
    {
        return $this->exRepo->getall();
    }

    public function add($data)
    {
        $rules = [
            'paid'     =>'required|numeric',
            'split_id' =>'required|integer',
            'desc'     =>'required|max:249|',
        ];

        // vaild
        $validator = Validator::make($data,$rules);

        if($validator->fails())
        {
            // set erros
            //  return   $validator->errors();
            $this->setError($validator->errors());
            return false;
        }

        if($this->exRepo->add($data))
        {
            return true;
        }

        $this->setError(['برجاء المحاوله مره اخري ']);
        return false;

    }

    public function updated($data)
    {
        $rules = [
            'id'     =>'required',
            'paid'     =>'required|numeric',
            'split_id' =>'required|integer',
            'desc'     =>'required|max:249|',
        ];

        // vaild
        $validator = Validator::make($data,$rules);

        if($validator->fails())
        {
            // set erros
            //  return   $validator->errors();
            $this->setError($validator->errors());
            return false;
        }

        if($this->exRepo->updated($data))
        {
            return true;
        }

        $this->setError(['برجاء المحاوله مره اخري ']);
        return false;
    }


    public function del($id)
    {
        $check = $this->exRepo->getByid($id);

        if(!empty($check))
        {
            if ($this->exRepo->del($id))
            {
                return true;
            }
            $this->setError(['برجاء المحاوله مره اخري ']);
            return false;
        }

        $this->setError(['لم نجد العنصر المراد حذف برجاء المحاوله مره اخري ..!']);
        return false;
    }

    public function serch($data)
    {
        return $this->exRepo->search($data);
    }
}