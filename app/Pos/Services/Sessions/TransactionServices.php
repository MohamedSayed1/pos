<?php


namespace App\Pos\Services\Sessions;


use App\Pos\Repository\Sessions\TransactionRepo;
use App\Pos\Services;
use Validator;

class TransactionServices extends Services
{
    private $transRepo ;

    public function __construct()
    {
        $this->transRepo = new TransactionRepo();
    }

    public function getbyId($id)
    {
        return $this->transRepo->getByid($id);
    }

    public function expenses($data)
    {
        $rules = [
            'details'     =>'required',
            'total'       =>'required|numeric',
        ];
        // vaild
        $validator = Validator::make($data,$rules);

        if($validator->fails())
        {
            $this->setError($validator->errors());
            return false;
        }

        if($this->transRepo->expenses($data))
            return true;


        $this->setError(['برجاء المحاوله مره اخري ']);
        return false;
    }

    public function getByStatus($id,$status)
    {
        return $this->transRepo->getByType($id,$status);
    }
}