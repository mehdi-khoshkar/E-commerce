<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    public function index()
    {
        $newProductItem= Product::all();
        return view('Front.index',compact('newProductItem'));
    }

    public function showSingleProduct($tile)
    {

        $productItem=Product::all()->where('title',$tile);
        return view('Front.product',compact('productItem'));
    }



}
