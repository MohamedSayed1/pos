<?php


namespace App\Pos\Services\Products;


use App\Pos\Repository\Products\ProductsRepo;
use App\Pos\Services;
use Validator;
use Illuminate\Http\Request;

class ProductServices extends Services
{
    private $productRepo;

    public function __construct()
    {
        $this->productRepo = new ProductsRepo();
    }

    public function add($request)
    {
        // rules to valid nullable
        $rules = [
            'name' => 'required|max:249|unique:product,name',
            'count' => 'required|integer',
            'pruch_prices' => 'required|numeric',
            'prices' => 'required|numeric',
            'photo' => 'nullable|image',
        ];

        // vaild
        $validator = Validator::make($request, $rules);

        if ($validator->fails()) {
            // set erros
            //  return   $validator->errors();
            $this->setError($validator->errors());
            return false;
        }


        if (!empty($request['photo'])) {

            $newImage = 'product_' . md5(time()) . '.' . $request['photo']->getClientOriginalExtension();

            $request['photo']->move(public_path() . '/upload/', $newImage);
            $request['photo'] = $newImage;
        }


        if ($this->productRepo->add($request)) {
            return true;
        }

        $this->setError(['هناك خطاء ..برجاء المحاوله مره اخري .. !']);
        return false;
    }


    public function updated($data)
    {
        // rules to valid
        $rules = [
            'id'            => 'required',
            'name'          => 'required|max:249|unique:product,name,' .$data['id'].',product_id',
            'count'         => 'required|integer',
            'pruch_prices'  => 'required|numeric',
            'prices'        => 'required|numeric',
            'photo'         => 'nullable|image|mimes:jpeg,jpg,png,svg,webp,tif,tiff',
        ];

        // vaild
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            // set erros
            //  return   $validator->errors();
            $this->setError($validator->errors());
            return false;
        }


        if (!empty($data['photo'])) {
            $newImage = 'product_' . md5(time()) . '.' . $data['photo']->getClientOriginalExtension();
            $data['photo']->move(public_path() . '/upload/', $newImage);
            $data['photo'] = $newImage;
        }

        if ($this->productRepo->updated($data)) {
            return true;
        }

        $this->setError(['هناك خطاء ..برجاء المحاوله مره اخري .. !']);
        return false;
    }

    public function getAll()
    {
        return $this->productRepo->getProducts();
    }

    public function getById($id)
    {
        $prod = $this->productRepo->product($id);

        if (!empty($prod))
            return $prod;


        $this->setError(['لا يوجد ذالك العنصر برجاء المحاوله مره اخري ... !']);
        return false;

    }

    public function getWithPage($serach =null)
    {
        return $this->productRepo->getPage($serach);
    }

    public function search($data)
    {
        return $this->productRepo->search($data);
    }
}