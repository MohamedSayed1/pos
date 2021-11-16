<?php


namespace App\Pos\Services\Sessions;


use App\Pos\Repository\Sessions\SessionsRepo;
use App\Pos\Repository\Users\UsersRepo;
use App\Pos\Services;
use Validator;

class SessionsServices extends Services
{

    private  $sessionRepo ;

    public function __construct()
    {
        $this->sessionRepo = new SessionsRepo();
    }

    public function getBysessionId($id)
    {
        return $this->sessionRepo->getBySessionId($id);
    }
    public function getAll()
    {
        return $this->sessionRepo->gets();
    }

    public function open($data)
    {
        $rules = [
            'opening_balance'     =>'required|numeric',
        ];
        // vaild
        $validator = Validator::make($data,$rules);

        if($validator->fails())
        {
            $this->setError($validator->errors());
            return false;
        }

        if($this->sessionRepo->open($data))
            return true;


        $this->setError(['برجاء المحاوله مره اخري ']);
        return false;
    }


    public function close($data)
    {
        $rules = [
            'balance'     =>'required|numeric',
            'session'     =>'required',
        ];
        // vaild
        $validator = Validator::make($data,$rules);

        if($validator->fails())
        {
            $this->setError($validator->errors());
            return false;
        }

        if($this->sessionRepo->close($data))
            return true;


        $this->setError(['برجاء المحاوله مره اخري ']);
        return false;
    }

    public function updated($data)
    {
        $rules = [
            'opening_balance'     =>'required|numeric',
            'id'                  =>'required',
        ];
        // vaild
        $validator = Validator::make($data,$rules);

        if($validator->fails())
        {
            $this->setError($validator->errors());
            return false;
        }

        if($this->sessionRepo->updated($data))
            return true;


        $this->setError(['برجاء المحاوله مره اخري ']);
        return false;
    }

    public function search($data)
    {
        return $this->sessionRepo->search($data);
    }

    public function getToUser()
    {
        return $this->sessionRepo->openSessionForUser();
    }
}