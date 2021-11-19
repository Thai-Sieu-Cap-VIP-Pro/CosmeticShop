<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class DiscountController extends Controller
{
    public function showDiscount()
    {
       $all_discount = DB::table('tbl_discount')->get();
        return view('discount.show_discount')->with('all_discount', $all_discount);
    }

    public function create()
    {
        $danhmuc = DB::table('tbl_category_product')->orderBy('category_id','DESC')->get();
        return view('discount.add_discount')->with(compact('danhmuc', $danhmuc));
    }

    public function saveDiscount(Request $request)
    {
       $data = array();
       $data['discount_name'] = $request->discount_name;
       $data['discount_desc'] = $request->discount_desc;
       $data['discount_percent'] = $request->discount_percent;
       $data['discount_category'] = $request->category_id;

        //check danh mục đã tồn tại khuyến mãi hay chưa
        //$check_discount = DB::table('tbl_discount')->where('discount_category', $request->category_id)->get();
        // if ($check_discount)
        // {
        //     //tồn tại rồi thì không cho insert nửa và báo lỗi
        //     echo "thêm không thành công";
        //     Session::put('message','Danh mục sản phẩm này đã tồn tại chương trình khuyến mãi');
        //     return redirect('/add-discount');
        // }
        // else
        // {
            //chưa có thì insert
            //trước khi insert thì update lại giá sản phẩm sau khi khuyến mãi

            $result = DB::table('tbl_product')->where('category_id', $data['discount_category'])->update(['discount_price'=> 30]);

            //nếu update giá thành công thì cho insert
            // if ($result)
            // {
            DB::table('tbl_discount')->insert($data);
            Session::put('message','Thêm chương trình khuyến mãi thành công');
            return redirect('/add-discount');
            // }
            // else
            // {
            //     //update giá không thành công thì báo lỗi
            // Session::put('message','Thêm chương trình khuyến không thành công');
            // return redirect('/add-discount');
            // }
        //}

    }

    public function editDiscount($id) {
        $edit_discount = DB::table('tbl_discount')->where('discount_id', $id)->first();
        $danhmuc = DB::table('tbl_category_product')->orderBy('category_id','DESC')->get();
        $magage_discount = view('discount.edit_discount')->with(compact('edit_discount','danhmuc'));
        return view('admin_layout')->with('discount.edit_discount', $magage_discount);

    }
    public function updateDiscount($id) {
       //logic xử lý update
       //check xem update có thay đổi percent hay không, nếu có thì trước khi update discount thì update lại product_price theo cái percent mới
       //nếu không thay đổi percent thì update bình thường (giống mấy cái trước)
    }
    public function deleteDiscount($id) {
        //tương tự như xử lý update
        //trước khi xóa thì set lại cái discount_price = product_price
    }
}
