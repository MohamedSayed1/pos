<?php


namespace App\Http\Controllers;
use App\Pos\Model\Sessions\Transaction;
use App\Pos\Paid;
use App\Pos\Repository\Products\ProductsRepo;
use App\Pos\Repository\Purchases\PurchasesRepo;
use App\Pos\Repository\Sessions\SessionsRepo;
use App\Pos\Repository\Sessions\TransactionDetailsRepo;
use App\Pos\Repository\Sessions\TransactionRepo;
use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

use App\Pos\Repository\SplitExRepo;

class test extends Controller
{

    public function index()
    {
        $x = new TransactionDetailsRepo();


        $row =  $x->getBYProduct(16,'sale') ;

     return   $row->sum(function ($row) {
            return $row->paid * $row->quantity;
        });


    }

}