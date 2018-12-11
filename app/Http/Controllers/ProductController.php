<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        $productItem =Product::all();
        return view('AdminPanel.product.product',compact('productItem'));
    }



    public function add()
    {
        return view('AdminPanel.product.AddProduct');
    }

    public function save(Request $request)
    {

        $product_data = [
            'title'=>$request->input('title'),
            'price'=>$request->input('price'),
            'stock'=>$request->input('stock'),
            'description'=>$request->input('description'),
            'thumbnail'=>$request->input('thumbnail')
            ];


        $product_create = Product::create($product_data);

        if ( $product_create instanceof Product) {
            return redirect()->route('admin.product.add')->with('success', 'محصول با موفقیت اضافه شد');
        }
        else {
            return redirect()->back()->with('error', 'متاسفانه محصول ثبت نشد');
        }

    }
}
