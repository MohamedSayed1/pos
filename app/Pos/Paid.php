<?php


namespace App\Pos;


use App\Pos\Model\Products\Products;
use App\Pos\Model\Sessions\Sessions;
use App\Pos\Model\Sessions\Transaction;
use App\Pos\Model\Sessions\TransactionDetails;
use Cart;

trait Paid
{
    public static  function paid($dic)
    {
        $add = new Transaction();
        $add->session_id = Auth()->user()->open_seesion;
        $add->user_id = Auth()->user()->id;
        $add->total = Cart::total() - $dic;
        $add->type = 1;
        $add->disc = $dic;
        $add->real_total = Cart::total();
        if($add->save()){
            foreach (Cart::content() as $row) {
                $produc = Products::find($row->id);
                $produc->count = $produc->count - $row->qty;
                $produc->save();

                $detills = new TransactionDetails();
                $detills->pro_id = $row->id;
                $detills->trans_id = $add->transaction_id;
                $detills->quantity = $row->qty;
                $detills->paid = $row->price;
                $detills->pruch_prices = $produc->pruch_prices;
                $detills->save();
            }

            return $add->transaction_id;
        }

        return false;

    }

    public static function return($data)
    {
         $qut = count($data['product']);
         $total = 0 ;
         $trans = new Transaction();
         $trans->session_id = Auth()->user()->open_seesion;
         $trans->user_id    = Auth()->user()->id;
         $trans->type       = -1;
         $trans->disc       = 0;
         $trans->status     = 'return';
         $trans->save();
        for($i = 0 ; $i < $qut ; $i++)
        {
            $product = Products::find($data['product'][$i]);
            $ditals = new TransactionDetails();
            $ditals->trans_id       = $trans->transaction_id;
            $ditals->pro_id         = $data['product'][$i];
            $ditals->quantity       = $data['count'][$i];
            $ditals->pruch_prices   = $product->pruch_prices;
            $ditals->paid           = $product->prices;
            $ditals->status         = 'return';
            $ditals->save();
            $product->count = $product->count + $data['count'][$i] ;
            $product->save();
            $total += $data['count'][$i] * $product->prices ;
        }
        // total
        $trans->total = $total;
        $trans->save();
        return true ;


    }

    public static function PinkBrief($session_id)
    {
     $session   = Sessions::find($session_id)->opening_balance;
     $tran      = Transaction::where('session_id',$session_id)->get();
     $sales     = $tran->where('type','=',1)->sum('total');
     $expenses  = $tran->where('type','=',-1)->sum('total');
     $total      = $tran->sum('total');
     return [
         'total'=>$total,
         'sales'=>$sales,
         'expenses'=>$expenses,
         'opening'=>$session,
         'actual'=> ($sales - $expenses)+ $session,
         'id'=> $session_id,
         ] ;
    }

    public static function Details($session_id)
    {
        $tran      = Transaction::where('session_id',$session_id)->get();
        $sales     = $tran->where('status','=',"sale")->sum('total');
        $expenses  = $tran->where('status','=',"expenses")->sum('total');
        $return    = $tran->where('status','=',"return")->sum('total');
        $expTotal   = $expenses + $return;
        $total     = $tran->sum('total');

        return [
            'total'=>$total,
            'sales'=>$sales,
            'expenses'=>$expenses,
            'return'=>$return,
            'actual'=> ($sales - $expTotal),

        ] ;
    }
}