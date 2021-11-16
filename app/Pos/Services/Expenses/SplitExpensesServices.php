<?php


namespace App\Pos\Services\Expenses;


use App\Pos\Repository\Expenses\SplitExRepo;
use App\Pos\Services;
use Validator;

class SplitExpensesServices extends Services
{
    private  $spERepo;
    public function __construct()
    {
        $this->spERepo = new SplitExRepo();
    }

    public function gets()
    {
        return $this->spERepo->getAll();
    }

    public function get($id = 0)
    {
        return $this->spERepo->getOne($id);
    }

    public function add($data)
    {
        // rules to valid
        $rules = [
            'name' =>'required|max:249|unique:split_expenses,name',
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

        if($this->spERepo->addNew($data))
            return true;

        return false;
    }

    public function updated($data)
    {
        $rules = [
            'id' =>'required|',
            'name' =>'required|max:249|unique:split_expenses,name,'. $data['id'] .',s_id',
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

        if($this->spERepo->updated($data))
            return true;

        return false;
    }

}