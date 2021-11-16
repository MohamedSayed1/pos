<?php


namespace App\Http\Controllers\Users;


use App\Http\Controllers\Controller;
use App\Pos\Services\Users\UsersServices;
use Illuminate\Http\Request;

class UsersControllers extends Controller
{
    private  $userSer ;

    public function __construct()
    {
        $this->userSer = new UsersServices();
    }

    public function index()
    {
        $users =  $this->userSer->get();

        return view('admin.users.index')
            ->with('users',$users);
    }

    public function updated(Request $request)
    {
        if($this->userSer->updated($request->all()))
            return response()->json(['status'=> 200]) ;


        $errors =  $this->userSer->errors();
        return response()->json(['status'=> 201,'data'=> $errors ]) ;
    }

    public function updatedPassword(Request $request)
    {

        if($this->userSer->updatedPassword($request->all()))
            return response()->json(['status'=> 200]) ;


        $errors =  $this->userSer->errors();
        return response()->json(['status'=> 201,'data'=> $errors ]) ;
    }
}