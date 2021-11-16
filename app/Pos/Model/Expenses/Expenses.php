<?php


namespace App\Pos\Model\Expenses;


use Illuminate\Database\Eloquent\Model;

class Expenses extends Model
{

    protected $table = "expenses";
    protected $primaryKey ="ex_id";

    public function getSlit()
    {
        return $this->belongsTo('App\Pos\Model\Expenses\Split_expenses','split_id','s_id');
    }
}