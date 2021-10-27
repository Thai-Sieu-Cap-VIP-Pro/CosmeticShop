<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class CategoryProduct extends Controller
{
    public function showCategory()
    {
       $all_category = DB::table('tbl_category_product')->get();
        return view('category.show_category')->with('all_categoy', $all_category);
    }

    public function addCategory()
    {
        return view('category.add_category');
    }

    public function saveCategory(Request $request)
    {
       $data = array();
       $data['category_name'] = $request->category_product_name;
       $data['category_desc'] = $request->category_product_desc;
       $data['category_status'] = $request->category_product_status;

       DB::table('tbl_category_product')->insert($data);
       Session::put('message','Thêm danh mục sản phẩm thành công');
       return redirect('/add-category');

    }

    public function unDisplayCategory($id)
    {
        DB::table('tbl_category_product')->where('category_id', $id)->update(['category_status'=>0]);
        Session::put('message','Bạn đã ẩn danh mục thành công');
        return redirect('/show-category');
    }

    public function displayCategory($id)
    {
        DB::table('tbl_category_product')->where('category_id', $id)->update(['category_status'=>1]);
        Session::put('message','Bạn đã kích hoạt danh mục thành công');
        return redirect('/show-category');
    }

    public function editCategory($id)
    {
        // $edit_category = DB::table('tbl_category_product')->where('category_id', $id)->get();
        // $magage_category = view('category.edit_category')->with('edit_category', $edit_category);
        // return view('admin_layout')->with('category.edit_category', $magage_category);
       
        return view('category.edit_category');
    }

    public function deleteCategory($id)
    {
        $edit_category = DB::table('tbl_category_product')->where('category_id', $id)->delete();
        Session::put('message','Xóa danh mục sản phẩm thành công');
       return redirect('/show-category');
    }
}
