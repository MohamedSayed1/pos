<?php


namespace App\Http\Controllers;



use App\Pos\Model\Products\Products;
//use Gloudemans\Shoppingcart\Cart;
use App\Pos\Paid;
use Helmesvs\Notify\Facades\Notify;
use Cart;
use Illuminate\Http\Request;

class cartControllers extends Controller
{
    public function index($id=0)
    {

         $product = Products::find($id);
         if(!empty($product))
         {
             Cart::add([
                 'id'=> $product->product_id ,
                 'name'=>$product->name,
                 'qty'=>1,
                 'price'=>$product->prices,
                 'options'=>['photo'=>$product->photo]
             ]);
             return view('admin.session.cart');
         }

         Notify::error('لا يوجد عدد كافي ', ' خطا..ّ!');
         return view('admin.session.cart');

    }

    public function updated(Request $request)
    {
        Cart::update($request->get('id'),$request->get('q') );
        return view('admin.session.cart');
    }

    public function del($id = 0)
    {
        Cart::remove($id);
        Notify::success('تم الحذف بنجاح', 'احسنت');
        return view('admin.session.cart');
    }

    public function Remove()
    {
        Cart::destroy();
        return view('admin.session.cart');
    }

    public function payModal()
    {
        return view('admin.session.paymodel');
    }

    public function paid($dic)
    {
        if($tran = Paid::paid($dic))
        {
            $data = $tran;
            Cart::destroy();
            return response()->json(['status'=> 200,'data'=>$data]) ;
        }

        return response()->json(['status'=> 201]) ;

    }

}