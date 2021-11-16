<?php


namespace App\Pos\Repository\Users;


use App\User;

class UsersRepo
{
    private $user;
    public function __construct()
    {
        $this->user = new User();
    }

    public function get()
    {
        return $this->user->get();
    }

    public function updated($data)
    {
        $user = $this->user->find($data['id']);
        $user->name = $data['name'];
        $user->username = $data['username'];
        return $user->save();
    }

    public function updatedPassword($data)
    {
        $user = $this->user->find($data['id']);
        $user->password = bcrypt($data['password']);

        return $user->save();
    }


    public function Session($seesion)
    {
        $user = $this->user->find(Auth()->user()->id);
        $user->open_seesion = $seesion;
        return $user->save();
    }


}