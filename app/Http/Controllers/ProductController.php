<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use Session;
use Illuminate\Support\Facades\Redirect;
session_start();

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $all_product = DB::table('tbl_product')->join('tbl_category_product','tbl_category_product.category_id', '=', 'tbl_product.category_id')
        ->join('tbl_brand','tbl_brand.brand_id', '=', 'tbl_product.brand_id')
        ->join('tbl_supplier','tbl_supplier.supplier_id', '=', 'tbl_product.supplier_id')->get();
        return view('product_admin.show_product_admin') ->with(compact('all_product', $all_product));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $danhmuc = DB::table('tbl_category_product')->orderBy('category_id','DESC')->get();
        $nhanhieu = DB::table('tbl_brand')->orderBy('brand_id', 'DESC')->get();
        $nhacungcap = DB::table('tbl_supplier')->orderBy('supplier_id', 'DESC')->get();
        return view('product_admin.add_product_admin')->with(compact('danhmuc','nhanhieu', 'nhacungcap'));
    }

    public function saveImage($image){
        $path = 'public/backEnd/images';
        $image_name = $image->getClientOriginalName();
        $image_name = current(explode('.', $image_name));
        $new_image_name = $image_name.rand(0,99).'.'.$image->getClientOriginalExtension();
        $image->move($path, $new_image_name);
        return $new_image_name;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = array();
        $data['product_name'] = $request->product_name;
        $data['product_price'] = $request->product_price;
        $data['product_desc'] = $request->product_desc;
        $data['product_quanity'] = $request->product_quanity;
        $data['product_status'] = $request->product_status;
        $data['product_state'] = $request->product_state;
        $data['product_expire'] = $request->product_expire;
        $data['category_id'] = $request->category_id;
        $data['brand_id'] = $request->brand_id;
        $data['supplier_id'] = $request->supplier_id;
        //Thêm ảnh
        $image = $request->file('product_image');
        $new_image_name = $this->saveImage($image);
        $data['product_img'] = $new_image_name;
        
        DB::table('tbl_product')->insert($data);
        Session::put('message','Thêm sản phẩm thành công');
        return redirect('/add-product-admin');
        
    }
     
    public function unStatusProduct($id)
    {
        DB::table('tbl_product')->where('product_id', $id)->update(['product_status'=>0]);
        Session::put('message','Sản phẩm hết hàng');
        return redirect('/show-product-admin');
    }

    public function statusProduct($id)
    {
        DB::table('tbl_product')->where('product_id', $id)->update(['product_status'=>1]);
        Session::put('message','Sản phẩm còn hàng');
        return redirect('/show-product-admin');
    }

    public function unStateProduct($id)
    {
        DB::table('tbl_product')->where('product_id', $id)->update(['product_state'=>0]);
        Session::put('message','Bạn đã ẩn danh mục thành công');
        return redirect('/show-product-admin');
    }

    public function stateProduct($id)
    {
        DB::table('tbl_product')->where('product_id', $id)->update(['product_state'=>1]);
        Session::put('message','Bạn đã hiện danh mục thành công');
        return redirect('/show-product-admin');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $edit_product = DB::table('tbl_product')->where('product_id', $id)->first();
        $danhmuc = DB::table('tbl_category_product')->orderBy('category_id','DESC')->get();
        $nhanhieu = DB::table('tbl_brand')->orderBy('brand_id', 'DESC')->get();
        $nhacungcap = DB::table('tbl_supplier')->orderBy('supplier_id', 'DESC')->get();
        $magage_product = view('product_admin.edit_product_admin')->with(compact('edit_product','danhmuc','nhanhieu','nhacungcap'));
        return view('admin_layout')->with('product_admin.edit_product_admin', $magage_product);
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */   
    public function update(Request $request, $id)
    {     
        $product = array();       
        $image = $request->file('product_image');
        if($image !=NULL){ 
            $new_image_name = $this->saveImage($image);
            $product['product_img'] = $new_image_name;   
        }

        $product['product_name'] = $request->product_name;
        $product['product_price'] = $request->product_price;
        $product['product_desc'] = $request->product_desc;
        $product['product_quanity'] = $request->product_quanity;
        $product['product_expire'] = $request->product_expire;
        $product['category_id'] = $request->category_id;
        $product['brand_id'] = $request->brand_id;
        $product['supplier_id'] = $request->supplier_id;

        DB::table('tbl_product')->where('product_id', $id)->update($product);
        Session::put('message','Cập nhập sản phẩm thành công');
        return redirect('/show-product-admin');   
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = DB::table('tbl_product')->where('product_id', $id)->first();
        $path = 'public/backEnd/images/'.$product->product_img;
        if(file_exists($path)){
            unlink($path);
        }
        $delete_product = DB::table('tbl_product')->where('product_id', $id)->delete();
        Session::put('message','Xóa sản phẩm thành công');
       return redirect('/show-product-admin');
    }

    
}
