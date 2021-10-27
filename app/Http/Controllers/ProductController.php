<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function showProduct()
    {
        return view('product_admin.show_product_admin');
    }

    public function addProduct()
    {
        return view('product_admin.add_product_admin');
    }
}
