<?php


namespace App\Pos\Services\Users;


use App\Pos\Repository\Users\UsersRepo;
use App\Pos\Services;
use Validator;

class UsersServices extends Services
{
    private  $userRepo ;

    public function __construct()
    {
        $this->userRepo = new UsersRepo();
    }


    public function get()
    {
        return $this->userRepo->get();
    }


    public function updated($data)
    {
        // rules to valid
        $rules = [
            'id'            => 'required',
            'username'      => 'required|max:249|unique:users,username,'.$data['id'].',id',
            'name'          => 'required|max:249|',
        ];

        // vaild
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            // set erros
            //  return   $validator->errors();
            $this->setError($validator->errors());
            return false;
        }

        if ($this->userRepo->updated($data)) {
            return true;
        }

        $this->setError(['هناك خطاء ..برجاء المحاوله مره اخري .. !']);
        return false;
    }


    public function updatedPassword($data)
    {
        // rules to valid
        $rules = [
            'id'            => 'required',
            'password'      => 'required|confirmed|min:2',
        ];

        // vaild
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            // set erros
            //  return   $validator->errors();
            $this->setError($validator->errors());
            return false;
        }

        if ($this->userRepo->updatedPassword($data)) {
            return true;
        }

        $this->setError(['هناك خطاء ..برجاء المحاوله مره اخري .. !']);
        return false;
    }
}