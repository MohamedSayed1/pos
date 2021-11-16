<?php


namespace App\Pos\Repository\Sessions;


use App\Pos\Model\Sessions\Transaction;
use Illuminate\Support\Facades\DB;

class TransactionRepo
{
    private $tranModel ;

    public function __construct()
    {
        $this->tranModel = new Transaction();
    }

    public function getByid($id =0)
    {
        return $this->tranModel->find($id);
    }

    public function getBySessionId($id)
    {
        return $this->tranModel->with('get')
            ->where('session_id',$id)->get();
    }

    public function expenses($data)
    {
        $this->tranModel->session_id = Auth()->user()->open_seesion;
        $this->tranModel->user_id    = Auth()->user()->id;
        $this->tranModel->total      = $data['total'];
        $this->tranModel->type       = -1;
        $this->tranModel->status     = "expenses";
        $this->tranModel->details    = $data['details'];
       return $this->tranModel->save();
    }

    public function getByType($id,$status)
    {
        return $this->tranModel->with('get')->
        where([
            ['session_id',$id],
            ['status',$status],
            ])->get();
    }
}