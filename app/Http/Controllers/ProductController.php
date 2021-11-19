<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use App\Models\Product;
use App\Models\CategoryProduct;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
{
      
    public function showProduct(Request $request)
    {
        $sort_by = $request->sort_by;
        
        if($sort_by == 'giam_dan'){
            $sort_field = 'product_price';
            $sort_order = 'DESC';
        }elseif($sort_by=='tang_dan'){
            $sort_field = 'product_price';
            $sort_order = 'ASC';               
        }elseif($sort_by=='kytu_za'){
            $sort_field = 'product_name';
            $sort_order = 'DESC';        
        }elseif($sort_by=='kytu_az'){
            $sort_field = 'product_name';
            $sort_order = 'ASC';                
        }else{
            $sort_field = 'product_id';
            $sort_order = 'ASC';
        }

       $all_product = DB::table('tbl_product')
       ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
       ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
       ->join('tbl_supplier','tbl_supplier.supplier_id','=','tbl_product.supplier_id')
       ->orderby($sort_field, $sort_order)->paginate(5)->appends(request()->query());
    //    $manage_product = view('product_admin.all_product')->with('all_product',$all_product);
        return view('product_admin.show_product_admin')->with(compact('all_product', $all_product));
    }

    public function addProduct()
    {
       $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
       $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
       $supplier_product = DB::table('tbl_supplier')->orderby('supplier_id','desc')->get();
       Session::put('message','Thêm sản phẩm thành công');
       return view('product_admin.add_product_admin')->with('cate_product', $cate_product)->with('brand_product',$brand_product)->with('supplier_product', $supplier_product);

    }
    public function saveProduct(Request $request)
    {
       $data = array();
       $data['product_name'] = $request->product_name;
       $data['product_price'] = $request->product_price;
       $data['product_quanity'] = $request->product_quanity;
       $data['product_desc'] = $request->product_desc;
       $data['category_id'] = $request->produce_cate;
       $data['brand_id'] = $request->produce_brand;
       $data['supplier_id'] = $request->produce_supplier;
       $data['discount_id'] = $request->product_discount;
       $data['product_status'] = $request->product_status;
       $data['product_expire'] = $request->product_expire;
       $get_image = $request->file('product_img');
       if ($get_image) {
           $get_name_image = $get_image->getClientOriginalName();
           $name_image = current(explode('.',$get_name_image));
           $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
           $get_image->move('public/backEnd/images', $new_image);
           $data['product_img'] = $new_image;
           DB::table('tbl_product')->insert($data);
           Session::put('message','Thêm sản phẩm thành công');
           return redirect('/add-product-admin');
       }
    
    }

    public function unDisplayProduct($id)
    {
        DB::table('tbl_product')->where('product_id', $id)->update(['product_status'=>0]);
        Session::put('message','Bạn đã ẩn sản phẩm thành công');
        return redirect('/show-product-admin');
    }

    public function displayProduct($id)
    {
        DB::table('tbl_product')->where('product_id', $id)->update(['product_status'=>1]);
        Session::put('message','Bạn đã kích hoạt sản phẩm thành công');
        return redirect('/show-product-admin');
    }

    public function editProduct($id)
    {
        $cate_product = DB::table('tbl_category_product')->orderby('category_id','desc')->get();
        $brand_product = DB::table('tbl_brand')->orderby('brand_id','desc')->get();
        $supplier_product = DB::table('tbl_supplier')->orderby('supplier_id','desc')->get();
        $edit_product = DB::table('tbl_product')->where('product_id', $id)->get();
        $manage_product = view('product_admin.edit_product_admin')->with(compact('edit_product','cate_product','brand_product','supplier_product'));
        
        return view('admin_layout')->with('product_admin.edit_product_admin', $manage_product);
        
    }

    public function deleteProduct($id)
    {
        DB::table('tbl_product')->where('product_id', $id)->delete();
        Session::put('message','Xóa sản phẩm thành công');
        return redirect('/show-product-admin');
    }

    public function updateProduct(Request $request, $id)
    {     
        $product = array();  
        $product['product_name'] = $request->product_name;
        $product['product_price'] = $request->product_price;
        $product['product_desc'] = $request->product_desc;
        $product['product_quanity'] = $request->product_quanity;
        $product['product_expire'] = $request->product_expire;
        $product['category_id'] = $request->category_id;
        $product['brand_id'] = $request->brand_id;
        $product['supplier_id'] = $request->supplier_id;
        
        // $product['discount_id'] = $request->product_discount;
        $product['product_status'] = $request->product_status;
        $product['product_expire'] = $request->product_expire;        
        $get_image = $request->file('product_img');
        if($get_image){ 
            if ($get_image) {
                $get_name_image = $get_image->getClientOriginalName();
                $name_image = current(explode('.',$get_name_image));
                $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
                $get_image->move('public/backEnd/images', $new_image);
                $product['product_img'] = $new_image;
            }
            DB::table('tbl_product')->where('product_id',$id)->update($product);
            Session::put('message','Cập nhật sản phẩm thành công');
            return redirect('/show-product-admin');   
        }

    }

    public function searchProduct(Request $request) {
         $search = $request->tukhoa;
        
        $all_product = DB::table('tbl_product')
       ->join('tbl_category_product','tbl_category_product.category_id','=','tbl_product.category_id')
       ->join('tbl_brand','tbl_brand.brand_id','=','tbl_product.brand_id')
       ->join('tbl_supplier','tbl_supplier.supplier_id','=','tbl_product.supplier_id')->where('product_name', 'like', '%'.$search.'%')
       ->paginate(4)->appends(request()->query());

       return view('product_admin.show_product_admin')->with('all_product', $all_product);  
        
    }
    public function index(Request $request)
    {
        $sort_by = $request->sort_by;
        
        if($sort_by == 'giam_dan'){
            $sort_field = 'product_price';
            $sort_order = 'DESC';
        }elseif($sort_by=='tang_dan'){
            $sort_field = 'product_price';
            $sort_order = 'ASC';               
        }elseif($sort_by=='kytu_za'){
            $sort_field = 'product_name';
            $sort_order = 'DESC';        
        }elseif($sort_by=='kytu_az'){
            $sort_field = 'product_name';
            $sort_order = 'ASC';                
        }else{
            $sort_field = 'product_id';
            $sort_order = 'ASC';
        }

        
        $all_product = DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_id', '=', 'tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id', '=', 'tbl_product.brand_id')
        ->join('tbl_supplier','tbl_supplier.supplier_id', '=', 'tbl_product.supplier_id')
        ->orderBy($sort_field, $sort_order)->get();
        return view('product_admin.show_product_admin') ->with(compact('all_product', $all_product));
    }
    
}
