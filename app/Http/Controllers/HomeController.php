<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

use Session;
use Illuminate\Support\Facades\Redirect;
session_start();
class HomeController extends Controller
{
    public function index()

    {
        $danhmuc = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id','DESC')->get();
        $thuonghieu = DB::table('tbl_brand')->where('brand_status', '1')->orderBy('brand_id','DESC')->get();
        /*$all_product = DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_id', '=', 'tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id', '=', 'tbl_product.brand_id')
        ->join('tbl_supplier','tbl_supplier.supplier_id', '=', 'tbl_product.supplier_id')->get();*/
        $all_product = DB::table('tbl_product')->where('product_state', '1')->orderBy('product_id','DESC')->limit(9)->get();
        $nhacungcap = DB::table('tbl_supplier')->where('supplier_status', '1')->orderBy('supplier_id','DESC')->get();
        return view('pages.home')->with('category', $danhmuc)->with('brand', $thuonghieu)->with('product', $all_product)
        ->with('supplier', $nhacungcap);
    }
}
