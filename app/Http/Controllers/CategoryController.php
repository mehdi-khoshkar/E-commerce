<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function save(Request $request)
    {
        $category_data=[
            'category_title' => $request->input('category_title')
        ];

        $category_create = Category::create($category_data);

        if($category_create instanceof Category)
        {
            return redirect()->route('admin.product.add')->with('success','دسته بندی با موفقیت اضافه شد');
        }
        else{
            return redirect()->back()->with('error', 'متاسفانه دسته بندی ثبت نشد');
        }
    }
}
