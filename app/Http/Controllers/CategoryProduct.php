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
        $edit_category = DB::table('tbl_category_product')->where('category_id', $id)->first();
        $magage_category = view('category.edit_category')->with('edit_category', $edit_category);
        return view('admin_layout')->with('category.edit_category', $magage_category);
       
        //return view('category.edit_category');
    }

    
    public function updateCategory(Request $request, $id)
    {
        $category = array();
        //$brand['brand_id'] = $id;
        $category['category_name'] = $request->category_product_name;
        $category['category_desc'] = $request->category_product_desc;
        //$brand->save();
        DB::table('tbl_category_product')->where('category_id', $id)->update($category);
        Session::put('message','Cập danh mục sản phẩm thành công');
        return redirect('/show-category');
    }

    public function deleteCategory($id)
    {
        $delete_category = DB::table('tbl_category_product')->where('category_id', $id)->delete();
        Session::put('message','Xóa danh mục sản phẩm thành công');
       return redirect('/show-category');
    }

    //end admin page
    public function showCategoryHome($id){
        $danhmuc = DB::table('tbl_category_product')->where('category_status', '1')->orderBy('category_id','DESC')->get();
        $thuonghieu = DB::table('tbl_brand')->where('brand_status', '1')->orderBy('brand_id','DESC')->get();
        $nhacungcap = DB::table('tbl_supplier')->where('supplier_status', '1')->orderBy('supplier_id','DESC')->get();
        $danhmuc_sanpham = DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_id', '=', 'tbl_product.category_id')
        ->where('tbl_product.category_id', $id)->get();
        $category_name = DB::table('tbl_category_product')->where('tbl_category_product.category_id',$id)->limit(1)->get();
        return view('pages.category.show_category')->with('category', $danhmuc)->with('brand', $thuonghieu)->with('supplier', $nhacungcap)
        ->with('category_by_id', $danhmuc_sanpham)->with('category_name', $category_name);
    }
}
